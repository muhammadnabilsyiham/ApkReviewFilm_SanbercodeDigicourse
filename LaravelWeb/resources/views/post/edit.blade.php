@extends('layouts.master')

@section('title')
    Edit Post
@endsection

@section('content')
    <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method('PUT')
        <div class="form-group">
            <label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="form-group">
            <label">Category</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">--Pilih Kategori--</option>
                    @forelse ($categories as $item)
                    @if ($item->id === $post->category_id)
                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                    @empty
                        <option value="">Belum Ada Kategori</option>
                    @endforelse
                </select>
        </div>
        <div class="form-group">
            <label">Image</label>
                <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
