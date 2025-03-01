@extends('layouts.master')

@section('title')
    add Category
@endsection

@section('content')
    <form action="/category" method="POST">
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
        <div class="form-group">
            <label">Category Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
