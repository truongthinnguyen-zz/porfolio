@extends('layouts.app')

@section('title', 'Homepage')

@section('introHeader')
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Big Thing Store</h1>
                        <hr class="small">
                        <span class="subheading">Buy Everything Cheaper</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="row" ng-controller="BlogController">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h5>Page {{ "" }}</h5>

                {{--<div class="post-preview">
                    <a href="/article/{{ "" }}">
                        <h2 class="post-title">
                            {{ "" }}
                        </h2>
                    </a>
                    <p class="post-subtitle">

                    </p>
                    <p class="post-meta">Posted by <a href="#">Thin Nguyen</a> on {{ "" }}</p>
                </div>
                <hr>--}}

        </div>
    </div>
@endsection