@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Article</h1>
            <p class="text-muted">Ini Halaman Article</p>
            <a href="{{ route('articles.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white">Create New Article</i>
            </a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>Category</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>Category</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($articles as $no => $article)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->content }}</td>
                                    <td>{{ $article->image }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="post"
                                            class="d-inline" onclick="return confirm('Yakin Ingin Dihapus?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
