<?php

namespace App\Helpers;

use App\Models\DetailPengujian;
use App\Models\Document;
use Illuminate\Support\Str;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use Sastrawi\Stemmer\StemmerFactory;

class VsmHelper
{
    public function getTextFromPdf($path)
    {
        $file = storage_path('app/public/' . $path);
        // $file = public_path('storage/'.$path);  // delete this line on production
        $parser = new Parser();
        $pdf = $parser->parseFile($file);
        $text = $pdf->getText();
        // $text = preg_replace('/[^(\x20-\x7F)]*/', '', $text);
        $text = str_replace(':', '', $text);

        $text = $this->sliceText($text);

        return $text;
    }

    public function sliceText($text)
    {
        $mark = 'Tabel';
        $slice = Str::before($text, $mark);
        $result = rtrim($slice);

        return $result;
    }

    public function vsmSearch($query)
    {
        // Tahap Pre-processing
        $documents = Document::all(); // Mengambil semua dokumen dari database

        // Load file stopwords
        $stopwordsPath = storage_path('/app/public/json/stopwords.json');
        $stopwords = json_decode(file_get_contents($stopwordsPath), true);

        // Stemmer initialization
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();

        foreach ($documents as $document) {
            // Case Folding
            $text = strtolower($document->text);

            // Tokenizing (termasuk angka)
            $tokens = str_word_count($text, 1, '0123456789');

            // Filtering
            $filteredTokens = array_diff($tokens, $stopwords);

            // Stemming
            $stemmedTokens = array_map([$stemmer, 'stem'], $filteredTokens);

            // Update dokumen dengan tokens yang sudah diproses
            $document->tokens = $stemmedTokens;
        }

        // Tahap Processing
        $queryTokens = str_word_count(strtolower($query), 1, '0123456789'); // termasuk angka
        $queryTokens = array_diff($queryTokens, $stopwords);
        $queryTokens = array_map([$stemmer, 'stem'], $queryTokens);

        $queryVector = $this->calculateQueryVector($queryTokens);

        foreach ($documents as $document) {
            $documentVector = $this->calculateDocumentVector($document->tokens);

            // Hitung dot product
            $dotProduct = $this->dotProduct($queryVector, $documentVector);

            // Hitung panjang vector
            $queryLength = $this->calculateVectorLength($queryVector);
            $documentLength = $this->calculateVectorLength($documentVector);

            // Hitung cosine similarity
            $cosineSimilarity = $this->calculateCosineSimilarity($dotProduct, $queryLength, $documentLength);

            // Simpan hasil cosine similarity ke dalam model Document
            $document->cosineSimilarity = $cosineSimilarity;
        }

        // Urutkan dokumen berdasarkan peringkat
        $sortedDocuments = $documents->sortByDesc('cosineSimilarity');

        $results = $sortedDocuments->where('cosineSimilarity');

        // Inisialisasi data ground truth
        $groundTruthPath = storage_path('/app/public/json/ground_truth.json');
        $groundTruth = json_decode(file_get_contents($groundTruthPath), true);

        $precision = 0;
        $recall = 0;
        $showPrecisionAndRecall = false;

        // Periksa apakah query ada dalam data ground truth
        if (isset($groundTruth[strtolower($query)])) {
            // Hitung precision dan recall
            $precision = $this->calculatePrecision($results, strtolower($query), $groundTruth);
            $recall = $this->calculateRecall($results, strtolower($query), $groundTruth);
            $showPrecisionAndRecall = true;
        }

        return [
            'sortedDocuments' => $results,
            'precision' => $precision,
            'recall' => $recall,
            'showPrecisionAndRecall' => $showPrecisionAndRecall
        ];
    }

    // Fungsi untuk menghitung vektor query
    private function calculateQueryVector($queryTokens)
    {
        $queryVector = [];
        $uniqueTokens = array_unique($queryTokens);

        foreach ($uniqueTokens as $token) {
            // Hitung term frequency (TF) pada query
            $termFrequency = array_count_values($queryTokens)[$token];

            // Hitung inverse document frequency (IDF)
            $documentFrequency = Document::whereRaw("JSON_CONTAINS(tokens, '\"$token\"')")->count();
            $inverseDocumentFrequency = log(Document::count() / ($documentFrequency + 1));

            // Hitung term frequency - inverse document frequency (TF-IDF)
            $tfIdf = $termFrequency * $inverseDocumentFrequency;

            $queryVector[$token] = $tfIdf;
        }

        return $queryVector;
    }

    // Fungsi untuk menghitung vektor dokumen
    private function calculateDocumentVector($documentTokens)
    {
        $documentVector = [];
        $uniqueTokens = array_unique($documentTokens);

        foreach ($uniqueTokens as $token) {
            // Hitung term frequency (TF) pada dokumen
            $termFrequency = array_count_values($documentTokens)[$token];

            // Hitung inverse document frequency (IDF)
            $documentFrequency = Document::whereRaw("JSON_CONTAINS(tokens, '\"$token\"')")->count();
            $inverseDocumentFrequency = log(Document::count() / ($documentFrequency + 1));

            // Hitung term frequency - inverse document frequency (TF-IDF)
            $tfIdf = $termFrequency * $inverseDocumentFrequency;

            $documentVector[$token] = $tfIdf;
        }

        return $documentVector;
    }

    // Fungsi untuk menghitung dot product
    private function dotProduct($queryVector, $documentVector)
    {
        $dotProduct = 0;

        foreach ($queryVector as $token => $queryTfIdf) {
            if (isset($documentVector[$token])) {
                $documentTfIdf = $documentVector[$token];
                $dotProduct += $queryTfIdf * $documentTfIdf;
            }
        }

        return $dotProduct;
    }

    // Fungsi untuk menghitung panjang vektor
    private function calculateVectorLength($vector)
    {
        $sumOfSquares = 0;

        foreach ($vector as $tfIdf) {
            $sumOfSquares += $tfIdf * $tfIdf;
        }

        return sqrt($sumOfSquares);
    }

    // Fungsi untuk menghitung cosine similarity
    private function calculateCosineSimilarity($dotProduct, $queryLength, $documentLength)
    {
        if ($queryLength * $documentLength != 0) {
            $cosineSimilarity = $dotProduct / ($queryLength * $documentLength);
        } else {
            $cosineSimilarity = 0;
        }

        return $cosineSimilarity;
    }

    // Fungsi untuk menghitung precision
    private function calculatePrecision($sortedDocuments, $query, $groundTruth)
    {
        $relevantDocumentsFound = 0;

        foreach ($sortedDocuments as $document) {
            // Cek apakah dokumen ada dalam data ground truth untuk query tertentu
            if (in_array(rtrim(Str::before($document->nama_file, '.')), $groundTruth[$query])) {
                $relevantDocumentsFound++;
            }
        }

        $precision = $relevantDocumentsFound / count($sortedDocuments);
        $precisionStr = $relevantDocumentsFound.' / '.count($sortedDocuments).' = ';

        return [
            'precision' => $precision,
            'precisionStr' => $precisionStr,
        ];
    }

    // Fungsi untuk menghitung recall
    private function calculateRecall($sortedDocuments, $query, $groundTruth)
    {
        $relevantDocumentsFound = 0;
        $totalRelevantDocuments = count($groundTruth[$query]);

        foreach ($sortedDocuments as $document) {
            // Cek apakah dokumen ada dalam data ground truth untuk query tertentu
            if (in_array(rtrim(Str::before($document->nama_file, '.')), $groundTruth[$query])) {
                $relevantDocumentsFound++;
            }
        }

        $recall = $relevantDocumentsFound / $totalRelevantDocuments;
        $recallStr = $relevantDocumentsFound.' / '.$totalRelevantDocuments.' = ';

        return [
            'recall' => $recall,
            'recallStr' => $recallStr,
        ];
    }
}