@extends('layouts.master')

@section('title')
    Post Page
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <img src="{{ asset('uploads/' . $post->image) }}" alt="">
    </div>
    <h1 class="text-primary mt-3">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <a href="/post" class="btn btn-secondary btn-sm">Back</a>
@endsection
