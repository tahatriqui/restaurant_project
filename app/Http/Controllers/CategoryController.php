<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $cats = Category::paginate(3);
        return view("category.CategoryPage", compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate(['cat_name' => 'required|string|unique:categories|min:3|max:40']);
        Category::insert([
            'cat_name' => $request->cat_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message', 'vous avez ajouter une nouvell category avec succès!');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route("cat.show")->with('message','suppression avec succès!');
}

    public function update(Request $request)
    {
        $request->validate([
        'cat_name' => 'required|string|unique:categories|min:3|max:40',
        ]);
        $id=$request->id;
        Category::findOrFail($id)->update([
        'cat_name' => $request->cat_name,
        ]);
        return redirect()->route('cat.show')->with('message', 'modification avec succès! ');
        //end else
    }

}
