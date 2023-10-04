<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Expense::all();
        return view('admin.expense.index', compact('expense'));
    } 
    
    public function create()
    {
        return view('admin.expense.create');
    } 

    public function store(Request $request)
    {
        $Expense = new Expense;
        $Expense->name = $request->name;
        $Expense->details = $request->details;
        $Expense->amount = $request->amount;
        $Expense->save();
        return redirect('expense')->with('success',"Expense added successfully");
    }

    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('admin.expense.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->name = $request->name;
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->save();
        return redirect('expense')->with('success',"Expense added successfully");
    }

    public function delete($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect('expense')->with('deleted',"Expense deleted successfully");
    }
}
