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
        $apiKey = env('OPENROUTER_API_KEY'); // pastikan di .env sudah diatur

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'HTTP-Referer' => 'http://localhost', // bisa diubah jika perlu
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'openai/gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Kamu adalah MentalCare Bot yang ramah dan menjawab dalam Bahasa Indonesia.'
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
