<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\OpenAIService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected OpenAIService $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function index()
    {
        return view('admin.blog.create');
    }

    public function generateContent(Request $request)
    {
        $title = $request->input('title');
        $content = $this->openAIService->generateContent($title);

        return view('admin.blog.show', compact('title', 'content'));
    }
}