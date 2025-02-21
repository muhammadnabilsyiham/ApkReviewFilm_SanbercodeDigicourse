@extends('layouts.master')

@section('title')
    Cast Page
@endsection

@section('content')
<h1 class="text-primary">{{ $cast->name }}</h1>
<p>{{ $cast->bio }}</p>

<a href="/cast" class="btn btn-secondary btn-sm">Back</a>
@endsection
