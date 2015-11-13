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
                <h3>Articles <small>&raquo; Edit Article</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Article Edit Form</h3>
                    </div>
                    <div class="panel-body">

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('admin.article.update', $id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            @include('admin.article._form')

                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                                name="action" value="continue">
                                            <i class="fa fa-floppy-o"></i>
                                            Save - Continue
                                        </button>
                                        <button type="submit" class="btn btn-success btn-lg"
                                                name="action" value="finished">
                                            <i class="fa fa-floppy-o"></i>
                                            Save - Finished
                                        </button>
                                        <button type="button" class="btn btn-danger btn-lg"
                                                data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-times-circle"></i>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- Confirm Delete --}}
        <div class="modal fade" id="modal-delete" tabIndex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">Please Confirm</h4>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            <i class="fa fa-question-circle fa-lg"></i> &nbsp;
                            Are you sure you want to delete this post?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('admin.article.destroy', $id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i> Yes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection