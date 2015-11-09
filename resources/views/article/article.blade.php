@extends('layouts.app')

@section('title', 'Homepage')

@section('introHeader')
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <span class="meta">Posted by <a href="#">Thin Nguyen</a> on {{ $article->published_at->format('M jS Y g:ia') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>
    </article>
@endsection