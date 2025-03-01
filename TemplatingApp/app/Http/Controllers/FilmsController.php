<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use File;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth')->except('index', 'show');
     }
     
    public function index()
    {
        $films = Film::all();

        return view('films.index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('films.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|min:2',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 2 karakter',
            'exists' => 'Inputan :attribute tidak terdaftar',
            'image' => 'Inputan :attribute harus berupa Poster'
        ]);

        $filmPosterNew = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('poster'), $filmPosterNew);

        $films = new Film;
 
        $films->tittle = $request->tittle;
        $films->summary = $request->summary;
        $films->release_year = $request->release_year;
        $films->genre_id = $request->genre_id;
        $films->poster = $filmPosterNew;
 
        $films->save();
 
        return redirect('/film');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $films = Film::find($id);

        return view('films.detail', ['films' => $films]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $films = Film::find($id);
        $genres = Genre::all();

        return view('films.edit', ['films' => $films, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tittle' => 'required|min:2',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id',
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 2 karakter',
            'exists' => 'Inputan :attribute tidak terdaftar',
            'image' => 'Inputan :attribute harus berupa Poster'
        ]);

        $films = Film::find($id);

        if($request->has('poster')) {
            File::delete('poster/' . $films->poster);

            $filmPosterNew = time() . '.' . $request->poster->extension();

            $request->poster->move(public_path('poster'), $filmPosterNew);

            $films->poster = $filmPosterNew;
        }

        $films->tittle = $request['tittle'];
        $films->summary = $request['summary'];
        $films->release_year = $request['release_year'];
        $films->genre_id = $request['genre_id'];

        $films->update();

        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $films = Film::find($id);

        if($films->poster) {
            File::delete('poster/' . $films->poster);
        }

        $films->delete();

        return redirect('/film');
    }
}
