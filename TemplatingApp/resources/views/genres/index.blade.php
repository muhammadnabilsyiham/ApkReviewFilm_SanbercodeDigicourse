@extends('layouts.master')

@section('title')
    Genre
@endsection

@section('content')
    <a href="/genre/create" class="btn btn-sm btn-primary mb-3">Add Genre</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genres)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{$genres->name}} </td>
                    <td>
                        <form action="/genre/{{ $genres->id }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus datanya?')">
                            @csrf
                            @method('delete')
                            <a href="/genre/{{$genres->id}}" class="btn btn-sm btn-success">Detail</a>
                            <a href="/genre/{{$genres->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">Data Genre masih kosong</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
