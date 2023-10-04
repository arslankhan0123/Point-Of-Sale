<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Post;
use App\Models\SaleRecord;
use App\Models\ShoppingCart;
use App\Models\Company;
use App\Models\Manager;
use App\Models\CompanyDetail;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        $allpost = Post::all();
        return view('admin.company.index', compact('company'));
    }

    public function create()
    {
        $manager = Manager::all();
        $allpost = Post::all();
        return view('admin.company.create', compact('manager'));
    }

    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->details = $request->details;
        $company->save();
        return redirect('companies')->with('success',"Company added successfully");
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    { 
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->details = $request->details;
        $company->save();
        return redirect('companies')->with('success',"Company updated successfully");
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('companies')->with('success',"Company deleted successfully");
    }

    public function view($id)
    {
        $companyDetail = CompanyDetail::where('company_id', $id)->get();

        $total = 0; $sub_total = 0; $tax = 0;
        $data = ShoppingCart::all();
        foreach ($companyDetail as $item) {
            $sub_total +=  $item->total_amount;
        }
        $total = $sub_total - $tax;
        return view('admin.company.view', compact('companyDetail', 'total'));
    }
}
