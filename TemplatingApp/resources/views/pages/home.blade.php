@extends('layouts.master')

@section('title')
    Halaman home
@endsection

@section('content')
<h1>Selamat Datang {{ $firstname }} {{ $lastname }}</h1><br>
<h2>Terima kasih telah bergabung di SaberBook. Social Media kita bersama!</h2>
@endsection