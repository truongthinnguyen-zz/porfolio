@extends('admin.layout')

@section('styles')
    <link href="{{ asset('/css/pickadate/themes/default.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/pickadate/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/selectize/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/selectize/selectize.bootstrap3.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>Articles <small>&raquo; Add New Article</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Article Form</h3>
                    </div>
                    <div class="panel-body">

                        @include('partials.errors')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('admin.article.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('admin.article._form')

                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-disk-o"></i>
                                            Save New Article
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection