<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $AllCategory = Category::all();
        return view('admin.category', compact('AllCategory'));
    }

    public function addcategory()
    {
        $AllCategory = Category::all();
        return view('admin.addCategory', compact('AllCategory'));
    }


    public function insertcategory(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'description' => 'required',
            ];

            $CustomMessage = [
                'title.required' => 'Title is required',
                'description.required' => 'Description is required',
            ];
            $this->validate($request, $rules, $CustomMessage);


            $category = new Category;
            $category->title = $request->title;
            $category->description = $request->description;
            // $category->status = $request->status;
            $category->save();
            return redirect('Category')->with('success',"Category added successfully");
        }
        return view('admin.addCategory');
    }


    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editCategory', compact('category'));
    }


    public function updatecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->description = $request->description;
        // $category->status = $request->status;
        $category->save();
        return redirect('Category')->with('success',"Category updated successfully");
    }


    public function deletecategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deleted',"Category deleted successfully");
    }
}
