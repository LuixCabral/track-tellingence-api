<?php

return [



    'default' => 'gemini',
    'default_for_images' => 'gemini',
    'default_for_audio' => 'gemini',
    'default_for_transcription' => 'gemini',
    'default_for_embeddings' => 'gemini',
    'default_for_reranking' => 'gemini',


    'caching' => [
        'embeddings' => [
            'cache' => false,
            'store' => env('CACHE_STORE', 'database'),
        ],
    ],


    'providers' => [

        'gemini' => [
            'driver' => 'gemini',
            'key' => env('GEMINI_API_KEY'),
        ],

        'groq' => [
            'driver' => 'groq',
            'key' => env('GROQ_API_KEY'),
        ],


    ],

];
