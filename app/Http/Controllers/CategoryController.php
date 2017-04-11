<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index($site_id)
    {
        $categories = Category::where('site_id', $site_id)->get();

        return view('categories.index', compact('categories', 'site_id'));
    }

    public function create($site_id)
    {
        return view('categories.create', compact('site_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'url' => 'required|max:100',
            'site_id' => 'integer',
        ]);

        Category::create($request->all());

        return redirect('/sites/' . $request->site_id . '/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'url' => 'required|max:100',
            'site_id' => 'integer',
        ]);

        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();


        return redirect('/sites/' . $request->site_id . '/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $url = '/sites/' . $category->site_id . '/categories';

        $category->delete();

        return redirect($url);
    }
}