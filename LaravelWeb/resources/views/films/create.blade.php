@extends('layouts.master')

@section('title')
    add Film
@endsection

@section('content')
    <form action="/film" method="POST" enctype="multipart/form-data">
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
            <label">Title</label>
                <input type="text" class="form-control" name="tittle" value="{{ old('tittle') }}">
        </div>
        <div class="form-group">
            <label>Summary</label>
            <textarea name="summary" class="form-control" cols="30" rows="10">{{ old('summary') }}</textarea>
        </div>
        <div class="form-group">
            <label>Release Year</label>
            <select name="release_year" class="form-control">
                @php
                    $thisYear = date('Y');
                    $startYear = 1;
                @endphp

                @for ($year = $thisYear; $year >= $startYear; $year--)
                    <option value="{{ $year }}" {{ old('release_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label">Genre</label>
                <select name="genre_id" id="" class="form-control">
                    <option value="">--Pilih Genre--</option>
                    @forelse ($genres as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option value="">Belum Ada Genre</option>
                    @endforelse
                </select>
        </div>
        <div class="form-group">
            <label">Poster</label>
                <input type="file" class="form-control" name="poster">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
