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

        // Validasi sederhana agar hanya membalas topik terkait mental health
        $allowedKeywords = ['mental', 'stres', 'cemas', 'depresi', 'psikolog', 'emosi', 'trauma', 'panik', 'overthinking'];
        $relevant = false;

        foreach ($allowedKeywords as $keyword) {
            if (stripos($userMessage, $keyword) !== false) {
                $relevant = true;
                break;
            }
        }

        if (!$relevant) {
            return response()->json([
                'reply' => 'Maaf, saya hanya bisa menjawab pertanyaan yang berkaitan dengan kesehatan mental. Silakan ajukan pertanyaan seputar stres, kecemasan, emosi, atau kesehatan jiwa.'
            ]);
        }

        // Kirim ke OpenRouter (Gemini, GPT, dll)
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'HTTP-Referer' => 'http://localhost', // ganti jika dipublish

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'HTTP-Referer' => 'http://localhost', // bisa diubah jika perlu

            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'openai/gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',

                    'content' => 'Kamu adalah MentalCare Bot, asisten ramah yang hanya menjawab pertanyaan seputar kesehatan mental, stres, kecemasan, perasaan, trauma, dan dukungan emosional. Tolak dengan sopan jika topik di luar itu.'

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

        return response()->json(['reply' => $reply]);
    }

}
