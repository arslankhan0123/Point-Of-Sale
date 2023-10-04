<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Post;
use App\Models\SaleRecord;
use App\Models\ShoppingCart;
use App\Models\Manager;

class ManagerController extends Controller
{
    public function index()
    {
        $manager = Manager::all();
        $allpost = Post::all();
        return view('admin.manager.index', compact('manager'));
    }

    public function create()
    {
        $AllCategory = Category::all();
        $allpost = Post::all();
        return view('admin.manager.create', compact('AllCategory', 'allpost'));
    }

    public function store(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ];

            $CustomMessage = [
                'name.required' => 'Manager name is required',
                'phone.required' => 'Phone is required',
                'address.required' => 'Address is required',
            ];
            $this->validate($request, $rules, $CustomMessage);


            $manager = new Manager;
            $manager->name = $request->name;
            $manager->phone = $request->phone;
            $manager->address = $request->address;
            $manager->save();
            return redirect('ManagersList')->with('success',"Manager added successfully");
        }
        return view('admin.manager.create');
    }

    public function edit($id)
    {
        $AllCategory = Category::all();
        $manager = Manager::findOrFail($id);
        return view('admin.manager.edit', compact('manager', 'AllCategory'));
    }

    public function update(Request $request, $id)
    {
        $manager = Manager::findOrFail($id);
        $manager->name = $request->name;
        $manager->phone = $request->phone;
        $manager->address = $request->address;
        $manager->save();
        return redirect('/ManagersList')->with('success',"Manager updated successfully");
    }

    public function delete($id)
    {
        $manager = Manager::findOrFail($id);
        $manager->delete();
        return redirect()->back()->with('deleted',"Manager deleted Successfully");
    }
}
