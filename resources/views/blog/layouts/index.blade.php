@extends('layouts.app')

@section('introHeader')
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{ $title }}</h1>
                        <hr class="small">
                        <h2 class="subheading">{{ $subtitle }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                {{-- The Articles --}}
                @foreach ($articles as $article)
                    <div class="post-preview">
                        <a href="{{ $article->url($tag) }}">
                            <h2 class="post-title">{{ $article->title }}</h2>
                            @if ($article->subtitle)
                                <h3 class="post-subtitle">{{ $article->subtitle }}</h3>
                            @endif
                        </a>
                        <p class="post-meta">
                            Posted on {{ $article->published_at->format('F j, Y') }}
                            @if ($article->tags->count())
                                in
                                {!! join(', ', $article->tagLinks()) !!}
                            @endif
                        </p>
                    </div>
                    <hr>
                @endforeach

                {{-- The Pager --}}
                <ul class="pager">

                    {{-- Reverse direction --}}
                    @if ($reverse_direction)
                        @if ($articles->currentPage() > 1)
                            <li class="previous">
                                <a href="{!! $articles->url($articles->currentPage() - 1) !!}">
                                    <i class="fa fa-long-arrow-left fa-lg"></i>
                                    Previous {{ $tag->tag }} Articles
                                </a>
                            </li>
                        @endif
                        @if ($articles->hasMorePages())
                            <li class="next">
                                <a href="{!! $articles->nextPageUrl() !!}">
                                    Next {{ $tag->tag }} Articles
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </li>
                        @endif
                    @else
                        @if ($articles->currentPage() > 1)
                            <li class="previous">
                                <a href="{!! $articles->url($articles->currentPage() - 1) !!}">
                                    <i class="fa fa-long-arrow-left fa-lg"></i>
                                    Newer {{ $tag ? $tag->tag : '' }} Articles
                                </a>
                            </li>
                        @endif
                        @if ($articles->hasMorePages())
                            <li class="next">
                                <a href="{!! $articles->nextPageUrl() !!}">
                                    Older {{ $tag ? $tag->tag : '' }} Articles
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
