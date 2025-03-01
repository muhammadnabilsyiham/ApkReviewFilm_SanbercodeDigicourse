<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function store(Request $request, $film_id) {
        $request->validate([
            'content' => 'required',
            'point' => 'required|integer|min:1|max:5',
        ],
        [
            'required' => 'Inputan :attribute review harus diisi!',
            'min' => 'Inputan :attribute review tidak boleh kosong!'
        ]);

        $user_id = Auth::id();

        $reviews = new Reviews;
 
        $reviews-> content = $request['content'];
        $reviews->point = $request['point'];
        $reviews->user_id = $user_id;
        $reviews->film_id = $film_id;
 
        $reviews->save();
 
        return redirect('/film/' . $film_id);
    }
}
