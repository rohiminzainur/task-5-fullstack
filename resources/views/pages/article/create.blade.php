@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Article</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('article.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control @error('title') is-invalid
                        @enderror" name="title"
                            value="{{ old('title') }}" autofocus placeholder="Enter Title">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid
                        @enderror" name="content"
                            id="" cols="10" rows="5" value="{{ old('content') }}" autofocus placeholder="Enter Content"></textarea>

                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"
                            class="form-control @error('image') is-invalid
                        @enderror" name="image"
                            value="{{ old('image') }}" autofocus placeholder="Enter Image">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="users_id">Username</label>
                        <select name="users_id"
                            class="form-control @error('users_id')
                            is-invalid
                        @enderror">
                            <option value="">Pilih Username</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->id }}</option>
                            @endforeach
                        </select>
                        @error('users_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Category</label>
                        <select name="categories_id"
                            class="form-control @error('categories_id')
                            is-invalid
                        @enderror">
                            <option value="">Pilih Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->id }}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
