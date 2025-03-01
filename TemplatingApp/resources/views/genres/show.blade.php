@extends('layouts.master')

@section('title')
    Genre Page
@endsection

@section('content')
<h1 class="text-primary">{{ $genres->name }}</h1>

<h4>List Genre</h4>

<div class="row">
    @forelse ($genres->ListFilm as $item)
    <div class="col-4">
                <div class="card">
                    <img src="{{ asset('poster/' . $item->poster) }}" width="500px" class="mx-auto" alt="...">
                    <div class="card-body">
                        <h3>{{ $item->tittle }}</h3>
                        <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                        <a href="/film/{{ $item->id }}" class="btn btn-primary btn-sm btn-block">Detail</a>
                    </div>
                </div>
            </div>
        @empty
    <h4>Tidak ada list Film untuk Genre ini !</h4>
@endforelse
</div>

<a href="/genre" class="btn btn-secondary btn-sm">Back</a>
@endsection
