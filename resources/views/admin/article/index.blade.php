@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Articles <small>&raquo; Listing</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/article/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New article
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('partials.errors')
                @include('partials.success')

                <table id="articles-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Published</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td data-order="{{ $article->published_at->timestamp }}">
                                {{ $article->published_at->format('j-M-y g:ia') }}
                            </td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->subtitle }}</td>
                            <td>
                                <a href="/admin/article/{{ $article->id }}/edit"
                                   class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="/article/{{ $article->slug }}"
                                   class="btn btn-xs btn-warning">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection