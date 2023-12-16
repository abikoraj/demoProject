<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get();
        return view('admin.category', ['categories' => $category]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        // dd($category);
        $category->save();
        return back()->with('message', 'Category Added Successfully!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->name = $request->name;
        // dd($category);
        $category->save();
        return back()->with('message', 'Category Updated Successfully!');
    }

    public function delete(Category $category) {
        $category->delete();
        return back()->with('message','Category Deleted Successfully!');
    }
}
