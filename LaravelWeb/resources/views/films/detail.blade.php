@extends('layouts.master')

@section('title')
    Film Page
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <img src="{{ asset('poster/' . $films->poster) }}" alt="">
    </div>
    <h1 class="text-primary mt-3">{{ $films->tittle }}</h1>
    <p>{{ $films->summary }}</p>

    <hr>
    <h4 class="text-dark">List Review</h4>

    @forelse ($films->listReview as $item)
        <div class="card mt-3">
            <h5 class="card-header bg-dark">
                {{ $item->user->name }}
            </h5>
            <div class="card-body">
                <p class="card-text">{{ $item->content }} /{{$item->point}}</p>
            </div>
        </div>
    @empty
        <h5>Tidak ada Komentar</h5>
    @endforelse
    @auth
        <form action="/reviews/{{ $films->id }}" method="POST">
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
            <div class="form-group mt-5">
                <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Buat Review"></textarea>
            </div>
            <div class="form-group">
                <label for="point">Rating</label>
                <select name="point" id="point" class="form-control">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Review</button>
        </form>
    @endauth
    <a href="/film" class="btn btn-secondary btn-sm mt-3">Back</a>
@endsection
