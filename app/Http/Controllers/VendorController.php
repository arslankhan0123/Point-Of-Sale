<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = Vendor::all();
        return view('admin.vendor.index', compact('vendor'));
    }

    public function create()
    {
        $vendor = Vendor::all();
        return view('admin.vendor.create', compact('vendor'));
    }

    public function store(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'vendor_name' => 'required',
                'quantity' => 'required',
                'total_amount' => 'required',
                'paid_amount' => 'required',
            ];

            $CustomMessage = [
                'vendor_name.required' => 'Vendor name is required',
                'quantity.required' => 'Quantity is required',
                'total_amount.required' => 'Total Amount is required',
                'paid_amount.required' => 'Paid Amount is required',
            ];
            $this->validate($request, $rules, $CustomMessage);


            $vendor = new Vendor;
            $vendor->vendor_name = $request->vendor_name;
            $vendor->quantity = $request->quantity;
            $vendor->total_amount = $request->total_amount;
            $vendor->paid_amount = $request->paid_amount;
            $vendor->save();
            return redirect('vendors')->with('success',"Vendor added successfully");
        }
        return view('admin.vendor.index');
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendor.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->vendor_name = $request->vendor_name;
        $vendor->quantity = $request->quantity;
        $vendor->total_amount = $request->total_amount;
        $vendor->paid_amount = $request->paid_amount;
        $vendor->save();
        return redirect('vendors')->with('success',"Vendor updated successfully");
    }

    public function delete($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();
        return redirect()->back()->with('deleted',"Vendor deleted successfully");
    }
}
