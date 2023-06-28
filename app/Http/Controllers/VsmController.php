<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VsmController extends Controller
{
    /**
     * Fungsi untuk melakukan pencarian dokumen menggunakan algoritma VSM.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchDocuments($request)
    {
        // Mendapatkan kata kunci dari request
        $keyword = $request;

        // Data dokumen yang akan dicari
        $documents = [
            [
                "id" => 1,
                "nama_file" => "dummy-1.pdf",
                "path" => "files/documents/dummy-1.pdf",
                "text" => "Pihak kedua melakukan pengujian bahan material di laboratorium",
                "created_at" => "2023-05-24T01:12:58.000000Z",
                "updated_at" => "2023-05-24T01:12:58.000000Z",
                "deleted_at" => null
            ],
            [
                "id" => 2,
                "nama_file" => "dummy-2.pdf",
                "path" => "files/documents/dummy-2.pdf",
                "text" => "PIHAK PERTAMA memberikan material untuk di uji",
                "created_at" => "2023-05-24T01:12:59.000000Z",
                "updated_at" => "2023-05-24T01:12:59.000000Z",
                "deleted_at" => null
            ],
            [
                "id" => 3,
                "nama_file" => "dummy-3.pdf",
                "path" => "files/documents/dummy-3.pdf",
                "text" => "Pengujian bahan MATERIAL dilakukan oleh PIHAK KEDUA dan akan diuji untuk beberapa hari kedepan",
                "created_at" => "2023-05-24T01:12:59.000000Z",
                "updated_at" => "2023-05-24T01:12:59.000000Z",
                "deleted_at" => null
            ]
        ];

        // Pre-processing
        $processedDocuments = [];
        foreach ($documents as $document) {
            // Case folding
            $text = strtolower($document['text']);

            // Filtering
            $text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);

            // Stemming (gunakan library stemming yang sesuai, contohnya 'tala' untuk bahasa Indonesia)
            // $text = tala_stemmer($text);

            // Tokenizing
            $tokens = explode(' ', $text);

            // Menyimpan hasil pre-processing ke dalam array
            $processedDocuments[] = [
                'id' => $document['id'],
                'nama_file' => $document['nama_file'],
                'path' => $document['path'],
                'tokens' => $tokens
            ];
        }

        // Processing
        $queryTokens = explode(' ', strtolower($keyword));
        $results = [];
        foreach ($processedDocuments as $document) {
            // Menghitung TF-IDF
            $tfIdf = [];
            foreach ($queryTokens as $queryToken) {
                $termFrequency = array_count_values($document['tokens'])[$queryToken] ?? 0;
                $documentFrequency = 0;
                foreach ($processedDocuments as $otherDocument) {
                    if (in_array($queryToken, $otherDocument['tokens'])) {
                        $documentFrequency++;
                    }
                }
                $inverseDocumentFrequency = log(count($processedDocuments) / ($documentFrequency + 1), 2);
                $tfIdf[$queryToken] = $termFrequency * $inverseDocumentFrequency;
            }

            // Menghitung dot product
            $dotProduct = 0;
            foreach ($queryTokens as $queryToken) {
                $dotProduct += $tfIdf[$queryToken] ?? 0;
            }

            // Menghitung panjang vector dokumen
            $documentLength = 0;
            foreach ($tfIdf as $tfIdfValue) {
                $documentLength += pow($tfIdfValue, 2);
            }
            $documentLength = sqrt($documentLength);

            // Menghitung panjang vector query
            $queryLength = 0;
            foreach ($queryTokens as $queryToken) {
                $queryLength += pow($tfIdf[$queryToken] ?? 0, 2);
            }
            $queryLength = sqrt($queryLength);

            // Menghitung cosine similarity
            $cosineSimilarity = $dotProduct / ($documentLength * $queryLength);

            // Menyimpan hasil pencarian ke dalam array
            $results[] = [
                'id' => $document['id'],
                'nama_file' => $document['nama_file'],
                'path' => $document['path'],
                'cosine_similarity' => $cosineSimilarity
            ];
        }

        // Mengurutkan berdasarkan peringkat (cosine similarity)
        usort($results, function ($a, $b) {
            return $b['cosine_similarity'] <=> $a['cosine_similarity'];
        });

        // Mengembalikan hasil pencarian
        return $results;
    }
}
