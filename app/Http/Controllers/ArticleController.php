<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;  // Add this import

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
