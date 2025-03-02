@extends('layouts.master')

@section('title')
    Film
@endsection

@section('content')
    <a href="/film/create" class="btn btn-sm btn-primary mb-3">Add Film</a>

    <div class="row">
        @foreach ($films as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('poster/' . $item->poster) }}" width="500px" class="mx-auto" alt="...">
                    <div class="card-body">
                        <h3>{{ $item->tittle }}</h3>
                        <span class="badge badge-dark">{{$item->genre->name}}</span>
                        <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                        <a href="/film/{{ $item->id }}" class="btn btn-primary btn-sm btn-block">Detail</a>
                        @auth
                            <div class="row mt-3">
                                <div class="col">
                                    <a href="/film/{{ $item->id }}/edit" class="btn btn-warning btn-sm btn-block">Edit</a>
                                </div>
                                <div class="col">
                                    <form action="/film/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
