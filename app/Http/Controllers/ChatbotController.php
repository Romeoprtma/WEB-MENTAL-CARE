<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function handle(Request $request)
{
    $userMessage = $request->input('message');
    $apiKey = trim(env('OPENROUTER_API_KEY'));

    // Validasi topik
    $allowedKeywords = ['mental', 'stres', 'cemas', 'depresi', 'psikolog', 'emosi', 'trauma', 'panik', 'overthinking'];
    $relevant = collect($allowedKeywords)->contains(fn($kw) => stripos($userMessage, $kw) !== false);

    if (!$relevant) {
        return response()->json([
            'reply' => 'Maaf, saya hanya bisa menjawab pertanyaan yang berkaitan dengan kesehatan mental.'
        ]);
    }

    // Panggil API OpenRouter
    $response = Http::withHeaders([
    'Authorization' => 'Bearer ' . $apiKey,
    'HTTP-Referer' => 'http://localhost',
    'Content-Type' => 'application/json',
])->post('https://openrouter.ai/api/v1/chat/completions', [
    'model' => 'openrouter/openai/gpt-3.5-turbo',
    'messages' => [
        [
            'role' => 'system',
            'content' => 'Kamu adalah MentalCare Bot, asisten ramah yang menjawab dalam Bahasa Indonesia dan hanya melayani topik terkait kesehatan mental, seperti stres, kecemasan, emosi, trauma, dan kesejahteraan psikologis.'
        ],
        [
            'role' => 'user',
            'content' => $userMessage
        ]
    ]
]);


    if (!$response->successful()) {
        Log::error('OpenRouter API error', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return response()->json([
            'reply' => 'Terjadi kesalahan saat menghubungi server AI.'
        ]);
    }

    $reply = $response->json('choices.0.message.content') ?? 'Maaf, saya tidak bisa menjawab saat ini.';
    return response()->json(['reply' => $reply]);
}

}
