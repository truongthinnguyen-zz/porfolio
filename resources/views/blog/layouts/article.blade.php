@extends('layouts.app', [
  'title' => $article->title,
  'meta_description' => $article->meta_description ?: config('blog.description'),
])

@section('introHeader')
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <h2 class="subheading">{{ $article->subtitle }}</h2>
                        <span class="meta">Posted by <a href="#">Thin Nguyen</a> on {{ $article->published_at->format('M jS Y g:ia') }}</span>
                        @if ($article->tags->count())
                            {!! join(', ', $article->tagLinks()) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')

    {{-- The Article --}}
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $article->content_html !!}
                </div>
            </div>
        </div>
    </article>

    {{-- The Pager --}}
    <div class="container">
        <div class="row">
            <ul class="pager">
                @if ($tag && $tag->reverse_direction)
                    @if ($article->olderArticle($tag))
                        <li class="previous">
                            <a href="{!! $article->olderArticle($tag)->url($tag) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                Previous {{ $tag->tag }} Article
                            </a>
                        </li>
                    @endif
                    @if ($article->newerArticle($tag))
                        <li class="next">
                            <a href="{!! $article->newerArticle($tag)->url($tag) !!}">
                                Next {{ $tag->tag }} Article
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                @else
                    @if ($article->newerArticle($tag))
                        <li class="previous">
                            <a href="{!! $article->newerArticle($tag)->url($tag) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                Next Newer {{ $tag ? $tag->tag : '' }} Article
                            </a>
                        </li>
                    @endif
                    @if ($article->olderArticle($tag))
                        <li class="next">
                            <a href="{!! $article->olderArticle($tag)->url($tag) !!}">
                                Next Older {{ $tag ? $tag->tag : '' }} Article
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
@endsection
