@extends('layouts.master')

@section('title')
    Halaman form
@endsection

@section('content')
<h1>Buat Account Baru</h1><br>
<h2>Sign Up Form</h2>

<form action="/home" method="POST">
    @csrf
    
    <label for="fname">First Name</label><br>
    <input type="text" name="firstname" id="fname"><br><br>

    <label for="lname">Last Name</label><br>
    <input type="text" name="lastname" id="lname"><br><br>

    <label>Gender</label><br>
    <input type="radio" name="Gender" value="1">Male<br>
    <input type="radio" name="Gender" value="1">Female<br>
    <input type="radio" name="Gender" value="1">Other <br><br>

    <label>Nationality</label>
    <select name="Nationality">
        <option value="1">Indonesian</option>
        <option value="2">Singapore</option>
        <option value="3">Malaysian</option>
        <option value="4">Australian</option>
    </select><br><br>

    <label>Languange Spoken</label><br>
    <input type="checkbox" name="Languange Spoken" value="1">Bahasa Indonesia<br>
    <input type="checkbox" name="Languange Spoken" value="2">English<br>
    <input type="checkbox" name="Languange Spoken" value="3">Other<br><br>

    <label>Bio</label><br>
    <textarea name="Bio" cols="30" rows="15"></textarea> <br><br>
    <button type="submit">Sign Up</button>

</form>
@endsection