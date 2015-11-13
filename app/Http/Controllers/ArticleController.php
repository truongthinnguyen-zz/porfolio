<?php

namespace App\Http\Controllers;

use App\Article;
use App\Jobs\BlogIndexData;
use App\Tag;
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
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

        return view($layout, $data);

        /*
        $articles = Article::where('published_at', '<=', Carbon::now())
            ->orderby('published_at', 'desc')
            ->paginate(config('blog.articles_per_page'));

        return view('articles', compact('articles'));
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $article = Article::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');

        if($tag){
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($article->layout, compact('article', 'tag'));
    }
}
