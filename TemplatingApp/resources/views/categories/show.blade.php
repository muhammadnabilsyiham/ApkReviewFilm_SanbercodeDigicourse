@extends('layouts.master')

@section('title')
    Category Page
@endsection

@section('content')
<h1 class="text-primary">{{ $categories->name }}</h1>
<p>{{ $categories->description }}</p>

<a href="/category" class="btn btn-secondary btn-sm">Back</a>
@endsection
