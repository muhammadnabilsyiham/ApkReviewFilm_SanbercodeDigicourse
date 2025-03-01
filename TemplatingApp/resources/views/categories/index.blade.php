@extends('layouts.master')

@section('title')
    Category
@endsection

@section('content')
    <a href="/category/create" class="btn btn-sm btn-primary mb-3">Add Category</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $categories)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{$categories->name}} </td>
                    <td>
                        <form action="/category/{{ $categories->id }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus datanya?')">
                            @csrf
                            @method('delete')
                            <a href="/category/{{$categories->id}}" class="btn btn-sm btn-success">Detail</a>
                            <a href="/category/{{$categories->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">Data Category masih kosong</th>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
