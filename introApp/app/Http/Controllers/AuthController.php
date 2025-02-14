<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register() {
        return view('pages.form');
    }

    public function home(Request $request) {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $bio = $request->input('bio');

        return view('pages.home', ["firstname" => $firstname, "lastname" => $lastname, "bio" => $bio]);
    }
}
