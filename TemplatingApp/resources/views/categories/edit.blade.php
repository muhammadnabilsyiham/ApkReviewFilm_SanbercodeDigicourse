@extends('layouts.master')

@section('title')
    Update Category
@endsection

@section('content')
    <form action="/category/{{$categories->id}}" method="POST">
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
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name', $categories->name)}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description', $categories->description)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection