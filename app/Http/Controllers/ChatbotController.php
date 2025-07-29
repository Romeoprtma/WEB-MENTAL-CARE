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
        $apiKey = env('OPENROUTER_API_KEY'); // Pastikan API key benar

        // Daftar kata kunci yang relevan dengan kesehatan mental
        $allowedKeywords = [
            'mental', 'depresi', 'cemas', 'stres', 'psikolog', 'terapi',
            'trauma', 'emosi', 'kesehatan jiwa', 'burnout', 'kecemasan', 'overthinking'
        ];

        $lowerMessage = strtolower($userMessage);
        $isRelevant = false;

        foreach ($allowedKeywords as $keyword) {
            if (str_contains($lowerMessage, $keyword)) {
                $isRelevant = true;
                break;
            }
        }

        if (!$isRelevant) {
            return response()->json([
                'reply' => 'Maaf, saya hanya bisa menjawab pertanyaan seputar kesehatan mental.'
            ]);
        }

        // Kirim ke OpenRouter
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'HTTP-Referer' => 'http://localhost',
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'openai/gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Kamu adalah MentalCare Bot. Kamu hanya boleh menjawab pertanyaan seputar kesehatan mental dalam Bahasa Indonesia. Jika pertanyaannya tidak relevan, tolong jawab bahwa kamu hanya menjawab topik kesehatan mental.'
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

        $data = $response->json();
        $reply = $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak bisa menjawab saat ini.';

        return response()->json(['reply' => $reply]);
    }
}
