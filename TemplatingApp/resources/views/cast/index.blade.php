@extends('layouts.master')

@section('title')
    Cast Page
@endsection

@section('content')
    <a href="/cast/create" class="btn btn-sm btn-primary mb-3">Add Cast</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cast as $casts)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{ $casts->name }} </td>
                    <td>
                        <form action="/cast/{{$casts->id}}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus datanya?')" >
                            @csrf
                            @method('delete')
                            <a href="/cast/{{$casts->id}}" class="btn btn-sm btn-success">Detail</a>
                            <a href="/cast/{{$casts->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">Data Cast masih kosong</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
