<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Sastrawi\Stemmer\StemmerFactory;

class VsmController extends Controller
{
    public function searchDocuments(Request $request, $query)
    {
        // Tahap Pre-processing
        $documents = Document::all();
        $stopwordsPath = public_path('json/stopwords.json');
        $stopwords = json_decode(file_get_contents($stopwordsPath), true);
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();

        foreach ($documents as $document) {
            $text = strtolower($document->text);
            $tokens = str_word_count($text, 1);
            $filteredTokens = array_diff($tokens, $stopwords);
            $stemmedTokens = array_map([$stemmer, 'stem'], $filteredTokens);

            // Tahap Processing
            $queryTokens = str_word_count(strtolower($query), 1);
            $queryTokens = array_diff($queryTokens, $stopwords);
            $queryTokens = array_map([$stemmer, 'stem'], $queryTokens);

            $queryVector = $this->calculateQueryVector($queryTokens, $stemmedTokens);
            $documentVector = $this->calculateDocumentVector($stemmedTokens);

            // Hitung dot product
            $dotProduct = $this->dotProduct($queryVector, $documentVector);

            // Hitung panjang vektor
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

    private function calculateQueryVector($queryTokens, $documentTokens)
    {
        $queryVector = [];
    
        // Hitung term frequency (TF) dari setiap kata dalam query
        $queryTermFrequency = array_count_values($queryTokens);
    
        // Hitung inverse document frequency (IDF) dari setiap kata dalam query
        $totalDocuments = Document::count();
        $queryInverseDocumentFrequency = [];
    
        foreach ($queryTermFrequency as $term => $frequency) {
            $documentFrequency = Document::where('tokens', 'like', '%"'.$term.'"%')->count();
            $inverseDocumentFrequency = $documentFrequency > 0 ? log($totalDocuments / $documentFrequency) : 0;
            $queryInverseDocumentFrequency[$term] = $inverseDocumentFrequency;
        }
    
        // Hitung TF-IDF untuk setiap kata dalam query
        foreach ($queryTermFrequency as $term => $frequency) {
            $tfIdf = $frequency * $queryInverseDocumentFrequency[$term];
            $queryVector[$term] = $tfIdf;
        }
    
        return $queryVector;
    }
    
    private function calculateDocumentVector($documentTokens)
    {
        $documentVector = [];
    
        // Hitung term frequency (TF) dari setiap kata dalam dokumen
        $documentTermFrequency = array_count_values($documentTokens);
    
        // Hitung inverse document frequency (IDF) dari setiap kata dalam dokumen
        $totalDocuments = Document::count();
        $documentInverseDocumentFrequency = [];
    
        foreach ($documentTermFrequency as $term => $frequency) {
            $documentFrequency = Document::where('tokens', 'like', '%"'.$term.'"%')->count();
            $inverseDocumentFrequency = $documentFrequency > 0 ? log($totalDocuments / $documentFrequency) : 0;
            $documentInverseDocumentFrequency[$term] = $inverseDocumentFrequency;
        }
    
        // Hitung TF-IDF untuk setiap kata dalam dokumen
        foreach ($documentTermFrequency as $term => $frequency) {
            $tfIdf = $frequency * $documentInverseDocumentFrequency[$term];
            $documentVector[$term] = $tfIdf;
        }
    
        return $documentVector;
    }
    
    private function dotProduct($queryVector, $documentVector)
    {
        $dotProduct = 0;
    
        foreach ($queryVector as $term => $tfIdf) {
            if (isset($documentVector[$term])) {
                $dotProduct += $tfIdf * $documentVector[$term];
            }
        }
    
        return $dotProduct;
    }
    
    private function calculateVectorLength($vector)
    {
        $length = 0;
    
        foreach ($vector as $value) {
            $length += $value * $value;
        }
    
        $length = sqrt($length);
    
        return $length;
    }
    
    private function calculateCosineSimilarity($dotProduct, $queryLength, $documentLength)
    {
        if ($queryLength > 0 && $documentLength > 0) {
            $cosineSimilarity = $dotProduct / ($queryLength * $documentLength);
        } else {
            $cosineSimilarity = 0;
        }
    
        return $cosineSimilarity;
    }
    
}
