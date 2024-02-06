<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin-panel.category.index',compact('categories'));
    }

    public function create() {
        return view('admin-panel.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:categories',
        ]);
        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/admin/categories')->with('successMsg','Successfully created a new category');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('admin-panel.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $Category = Category::find($id);
        
        $Category->update([
            'name'=> $request->name,
        ]);
        return redirect('/admin/categories')->with('successMsg','Successfully updated');

        // $Category->update([
        //     'name' => $request->name,,
        // ]);
        // return redirect('/admin/categories')->with('successMsg','Successfully Updated!');
    }


    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin/categories')->with('successMsg','Successfully deleted a category');
    }
}
