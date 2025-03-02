@extends('layouts.master')

@section('title')
    add Genre
@endsection

@section('content')
    <form action="/genre" method="POST">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
