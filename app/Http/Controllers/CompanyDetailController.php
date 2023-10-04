<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Post;
use App\Models\SaleRecord;
use App\Models\ShoppingCart;
use App\Models\Company;
use App\Models\CompanyDetail;

class CompanyDetailController extends Controller
{
    public function CompanyDetails()
    {
        $companyDetail = CompanyDetail::all();
        return view('admin.company.companyDetailsIndex', ['companyDetail' => $companyDetail]);
    }

    public function create()
    {
        $company = Company::all();
        return view('admin.company.companyDetailsCreate', compact('company'));
    }

    public function store(Request $request)
    {
        $companyDetail = new CompanyDetail;
        $companyDetail->company_id = $request->company_id;
        $companyDetail->detail_of_amount = $request->detail_of_amount;
        $companyDetail->company_account = $request->company_account;
        $companyDetail->company_amount = $request->company_amount;
        $companyDetail->owner_amount = $request->owner_amount;
        $companyDetail->total_amount = $request->total_amount;
        $companyDetail->save();
        return redirect('CompanyDetails')->with('success',"Company Details added successfully");
    }
}
