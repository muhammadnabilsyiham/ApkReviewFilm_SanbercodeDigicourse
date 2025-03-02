@extends('layouts.master')

@section('title')
    Update Genre
@endsection

@section('content')
    <form action="/genre/{{$genres->id}}" method="POST">
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
            <input type="text" class="form-control" name="name" value="{{old('name', $genres->name)}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection