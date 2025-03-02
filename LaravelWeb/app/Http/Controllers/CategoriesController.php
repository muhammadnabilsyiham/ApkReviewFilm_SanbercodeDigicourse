<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required',
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 2 karakter'
        ]);
        DB::table('categories')->insert([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        return redirect('/category');
    }

    public function index() {
        $categories = DB::table('categories')->get();

        return view('categories.index', ['categories' => $categories]);
    }

    public function show($id) {
        $categories = DB::table('categories')->find($id);

        return view('categories.show', ['categories' => $categories]);
    }

    public function edit($id) {
        $categories = DB::table('categories')->find($id);

        return view('categories.edit', ['categories' => $categories]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:2',
            'description' => 'required',
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 2 karakter'
        ]);
        DB::table('categories')
        ->where('id', $id)
        ->update([
            'name' => $request['name'],
            'description' => $request['description']
        ]);
    return redirect('/category');
    }

    public function destroy($id) {
        DB::table('categories')->where('id', $id)->delete();

        return redirect('/category');
    }
}