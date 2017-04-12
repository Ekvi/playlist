<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;


class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index($category_id)
    {
        $sections = Section::where('category_id', $category_id)->get();

        return view('sections.index', compact('sections', 'category_id'));
    }

    public function create($category_id)
    {
        return view('sections.create', compact('category_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'url' => 'required|max:100',
            'category_id' => 'integer',
        ]);

        Section::create($request->all());

        return redirect('/categories/' . $request->category_id . '/sections');
    }

    public function edit($id)
    {
        $section = Section::find($id);

        return view('sections.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'url' => 'required|max:100',
            'category_id' => 'integer',
        ]);

        $section = Section::find($id);
        $section->fill($request->all());
        $section->save();


        return redirect('/categories/' . $request->category_id . '/sections');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);

        $url = '/categories/' . $section->category_id . '/sections';

        $section->delete();

        return redirect($url);
    }
}