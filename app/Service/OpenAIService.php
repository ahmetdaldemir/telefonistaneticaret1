<?php

// app/Services/OpenAIService.php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function generateContent($title)
    {
        $response = Http::withToken(config('services.openai.api_key'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo', // Yeni model
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => "Write a blog content for the title: " . $title],
                ],
                'max_tokens' => 100,
            ]);

        $data = $response->json();

        if (isset($data['error'])) {
            dd($data['error']['message']);
        }

        return $data['choices'][0]['message']['content'];
    }
}
