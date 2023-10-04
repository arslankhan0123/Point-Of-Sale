<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $data = ShoppingCart::all();
        $totalCost = $data->sum('totalcost');
        // dd($totalCost);

        $pdf = PDF::loadView('invoices.invoice', compact('data', 'totalCost'));
        return $pdf->download('invoice.pdf');
    }
}
