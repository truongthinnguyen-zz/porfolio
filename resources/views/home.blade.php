@extends('layouts.app')

@section('title', 'Homepage')

@section('introHeader')
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Thin Nguyen's Blog</h1>
                        <hr class="small">
                        <span class="subheading">Code Smart Not Hard</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h5>Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}</h5>
            @foreach($articles as $article)
                <div class="post-preview">
                    <a href="/article/{{ $article->slug }}">
                        <h2 class="post-title">
                            {{ $article->title }}
                        </h2>
                    </a>
                    <p class="post-subtitle">
                        {{ str_limit($article->content, $limit = 150, $end = '...') }}
                    </p>
                    <p class="post-meta">Posted by <a href="#">Thin Nguyen</a> on {{ $article->published_at->format('M jS Y g:ia') }}</p>
                </div>
                <hr>
            @endforeach

            {!! $articles->render() !!}

        </div>
    </div>
@endsection