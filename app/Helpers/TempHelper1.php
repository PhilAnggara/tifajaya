<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Sastrawi\Stemmer\StemmerFactory;

class VsmController extends Controller
{
    // Fungsi untuk melakukan pencarian menggunakan algoritma VSM
    public function searchDocuments(Request $request, $query)
    {
        // Tahap Pre-processing
        $documents = Document::all(); // Mengambil semua dokumen dari database

        // Load file stopwords
        $stopwordsPath = public_path('json/stopwords.json');
        $stopwords = json_decode(file_get_contents($stopwordsPath), true);

        // Stemmer initialization
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();

        foreach ($documents as $document) {
            // Case Folding
            $text = strtolower($document->text);

            // Tokenizing
            $tokens = str_word_count($text, 1);

            // Filtering
            $filteredTokens = array_diff($tokens, $stopwords);

            // Stemming
            $stemmedTokens = array_map([$stemmer, 'stem'], $filteredTokens);

            // Update dokumen dengan tokens yang sudah diproses
            $document->tokens = $stemmedTokens;
        }

        // Tahap Processing
        $queryTokens = str_word_count(strtolower($query), 1);
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

        return response()->json($sortedDocuments);
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

}
