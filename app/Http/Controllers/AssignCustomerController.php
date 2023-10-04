<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Post;
use App\Models\SaleRecord;
use App\Models\ShoppingCart;
use App\Models\Manager;
use App\Models\AssignCustomer;

class AssignCustomerController extends Controller
{
    public function index()
    {
        $assignCustomer = AssignCustomer::all();
        $allpost = Post::all();
        return view('admin.assigncustomer.index', compact('assignCustomer'));
    }

    public function create()
    {
        $customers = Customer::all();
        $managers = Manager::all();
        return view('admin.assigncustomer.create', compact('customers', 'managers'));
    }

    public function store(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'manager_id' => 'required',
                'customer_id' => 'required',
            ];

            $CustomMessage = [
                'manager_id.required' => 'Manager is required',
                'customer_id.required' => 'Customer is required',
            ];
            $this->validate($request, $rules, $CustomMessage);
            $this->validate($request, $rules, $CustomMessage);


            $assignCustomer = new AssignCustomer;
            $assignCustomer->manager_id = $request->manager_id;
            $assignCustomer->customer_id = $request->customer_id;
            $assignCustomer->save();
            return redirect('AssignCustomerToManager')->with('success',"Customer Assign to Manager added successfully");
        }
        return view('admin.assigncustomer.create');
    }

    public function edit($id)
    {
        $customers = Customer::all();
        $managers = Manager::all();
        $assignCustomer = AssignCustomer::findOrFail($id);
        return view('admin.assigncustomer.edit', compact('assignCustomer', 'customers', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $assignCustomer = AssignCustomer::findOrFail($id);
        $assignCustomer->customer_id = $request->customer_id;
        $assignCustomer->manager_id = $request->manager_id;
        $assignCustomer->save();
        return redirect('/AssignCustomerToManager')->with('success',"Customer Assign to Manager updated successfully");
    }

    public function delete(Request $request, $id)
    {
        $assignCustomer = AssignCustomer::findOrFail($id);
        $assignCustomer->delete();
        return redirect('/AssignCustomerToManager')->with('deleted',"Customer Assign to Manager deleted successfully");
    }

    public function view(Request $request, $id)
    {
        $assignCustomer = AssignCustomer::findOrFail($id);
        $user = Manager::find($id);
        // if(!$user->customers->empty())
        // {
        //     dd($user->customers);
        // }
        $customers = $user->customers;
        // dd($customers);
        
        // dd($assignCustomer->customer_id);
        $customer = Customer::where('id', $id)->get();
        // dd($customers);
        return view('admin.assigncustomer.view', compact('customers'));
    }
}
