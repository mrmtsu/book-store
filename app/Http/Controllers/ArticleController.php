<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');    
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $originalImg = $request->image;
        $filePath = $originalImg->store('public');
        $article->image = str_replace('public/', '', $filePath);
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }

    
}
