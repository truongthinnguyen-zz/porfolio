<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Jobs\ArticleFormFields;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Tests\Input\ArgvInputTest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index')->withArticles(Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->dispatch(new ArticleFormFields());
        return view('admin.article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $article = Article::create($request->postFillData());
        $article->syncTags($request->get('tags', []));

        return redirect()->route('admin.article.index')->withSuccess('New article successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->dispatch(new ArticleFormFields($id));
        return view('admin.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->fill($request->postFillData());
        $article->save();

        $article->syncTags($request->get('tags', []));

        if($request->action === 'continue'){
            return redirect()->back()->withSuccess('Article saved');
        }

        return redirect()->route('admin.article.index')->withSuccess('Post saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('admin.article.index')->withSuccess('Article deleted.');
    }
}
