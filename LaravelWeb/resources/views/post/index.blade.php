@extends('layouts.master')

@section('title')
    Category
@endsection

@section('content')
    <a href="/post/create" class="btn btn-sm btn-primary mb-3">Add Post</a>

    <div class="row">
        @foreach ($post as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('uploads/' . $item->image)}}" width="500px" class="mx-auto" alt="...">
                <div class="card-body">
                  <h3>{{$item->title}}</h3>
                  <p class="card-text">{{Str::limit($item->content, 50)}}</p>
                  <a href="/post/{{$item->id}}" class="btn btn-primary btn-sm btn-block">Detail</a>
                  @auth
                  <div class="row mt-3">
                    <div class="col">
                        <a href="/post/{{$item->id}}/edit" class="btn btn-warning btn-sm btn-block">Edit</a>
                    </div>
                    <div class="col">
                        <form action="/post/{{$item->id}}" method="POST">
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
