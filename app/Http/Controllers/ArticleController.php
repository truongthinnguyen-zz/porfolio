<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('published_at', '<=', Carbon::now())
            ->orderby('published_at', 'desc')
            ->paginate(config('blog.articles_per_page'));

        return view('articles', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $article = Article::whereSlug($slug)->firstOrFail();

        return view('article-detail', compact('article'));
    }
}
