<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\SaleRecord;
use App\Models\CustomerDetail;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customer.index', compact('customer'));
    }

    public function create()
    {
        $customer = Customer::all();
        return view('admin.customer.create', compact('customer'));
    }


    public function store(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'remaining_payment' => 'required',
            ];

            $CustomMessage = [
                'name.required' => 'Customer name is required',
                'phone.required' => 'Phone is required',
                'address.required' => 'Address is required',
                'remaining_payment.required' => 'Remaining Amount is required',
            ];
            $this->validate($request, $rules, $CustomMessage);


            $customer = new Customer;
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->remaining_payment = $request->remaining_payment;
            $customer->save();
            return redirect('Customers')->with('success',"Customer added successfully");
        }
        return view('admin.customer.create');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->remaining_payment = $request->remaining_payment;
        $customer->save();
        return redirect('/Customers')->with('success',"Customer updated successfully");
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('deleted',"Customer deleted successfully");
    }

    public function view($id)
    {  
        $customer = SaleRecord::where('customer_id', $id)->get();
        return view('admin.customer.view', compact('customer'));
    }

    public function CustomersDataDelete($id)
    { 
        $SaleRecord = SaleRecord::findOrFail($id);
        $SaleRecord->delete();
        return redirect()->back()->with('deleted',"SaleRecord deleted successfully");
    }

    public function CustomersDetails()
    { 
        $customerDetail = CustomerDetail::all();
        return view('admin.customer.customerDetails.index', compact('customerDetail'));
    }

    public function CustomersDetailsCreate()
    { 
        $customers = Customer::all();
        return view('admin.customer.customerDetails.create', compact('customers'));
    }

    public function CustomersDetailsStore(Request $request)
    { 
        $CustomerDetail = new CustomerDetail;
        $CustomerDetail->customer_id = $request->customer_id;
        $CustomerDetail->paid = $request->paid;
        $CustomerDetail->remaining = $request->remaining;
        $CustomerDetail->save();
        return redirect('CustomersDetails')->with('success',"CustomersDetails added successfully");
    }

    public function CustomersDataDetails($id)
    { 
        $customerDetail = CustomerDetail::where('customer_id', $id)->get();
        // dd($customerDetail);
        return view('admin.customer.customerDetails.viewdetails', compact('customerDetail'));
    }

    public function CustomersDetailsEdit($id)
    { 
        $customers = Customer::all();
        $customerDetail = CustomerDetail::find($id);
        // dd($customerDetail);
        return view('admin.customer.customerDetails.edit', compact('customerDetail', 'customers'));
    }

    public function CustomersDetailsUpdate(Request $request, $id)
    { 
        $customerDetail = CustomerDetail::findOrFail($id);
        // $customerDetail = CustomerDetail::where('customer_id', $id)->get();
        $customerDetail->customer_id = $request->customer_id;
        $customerDetail->paid = $request->paid;
        $customerDetail->remaining = $request->remaining;
        $customerDetail->save();
        return redirect('CustomersDetails')->with('success',"CustomersDetails UPDATED successfully");
    }

    public function CustomerId(Request $request)
    {
        $EmployeeLeaves = LeaveType::where('employee_id', '=', $request->employee_id)->get();
        dd($request->customer_id);
        // return view('leave.companycreateleaves', compact('EmployeeLeaves'));
        return response()->json([
            'setempId'=>$EmployeeLeaves,
        ]);
    }
}
