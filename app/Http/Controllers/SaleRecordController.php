<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Post;
use App\Models\SaleRecord;
use App\Models\ShoppingCart;
use App\Models\Manager;
use App\Models\FinalReport;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\AssignCustomer;
use App\Models\Expense;
use DB;

class SaleRecordController extends Controller
{
    public function finalReport()
    {
        $expense = Expense::all();
        $finalReport = FinalReport::all();

        $totalCost = DB::table('final_reports')->sum('totalcost');
        $totalReceivedPayment = DB::table('final_reports')->sum('receivedpayment');

        return view('admin.finalReport.index', compact('finalReport', 'totalCost', 'expense', 'totalReceivedPayment'));
    }

    public function finalReportDelete($id)
    {
        $FinalReport = FinalReport::find($id);
        $FinalReport->delete();
        return redirect('finalReport')->with('deleted', 'FinalReport deleted successfully');
    }

    public function finalReportEdit($id)
    {
        $FinalReport = FinalReport::find($id);
        return view('admin.finalReport.edit', compact('FinalReport'));
    }

    public function finalReportUpdate(Request $request, $id)
    {
        $FinalReport = FinalReport::find($id);
        $productSellingPrice = $FinalReport->products->selling_price;
        $totalCost = $productSellingPrice * $request->quantity;
        // dd($product);
        $FinalReport->quantity = $request->quantity;
        $FinalReport->totalcost = $totalCost;
        $FinalReport->save();
        return redirect('finalReport')->with('success', 'FinalReport updated successfully');
    }


    public function storeStatus(Request $request)
    {
        $storeStatus = $request->input('storeStatus');
        $SaleRecords = SaleRecord::all();
        
        foreach ($SaleRecords as $SaleRecord) {
            $SaleRecord->status = $storeStatus;
            $SaleRecord->save();
        }

        return redirect('SaleReport')->with('success', 'Status added successfully');
    }


    public function index(Request $request)
    {
        $SaleRecord = SaleRecord::all();
        return view('admin.salerecord.index', compact('SaleRecord'));
    }

    public function finalMove($id)
    {
        // $mainProduct = Product::find($id);
        $product = SaleRecord::find($id);
        $productId = $product->product_id;

        $productFind = Product::find($productId);
        $productFindQuantity = $productFind->quantity;
        

        $totalcost = $product->quantity * $product->products->selling_price;
        // dd($totalcost);
        $finalReport = new FinalReport;
        $finalReport->quantity = $product->quantity;
        $finalReport->product_id = $product->product_id;
        $finalReport->customer_id = $product->customer_id;
        $finalReport->discount = $product->discount;
        $finalReport->totalcost = $totalcost;
        $finalReport->receivedpayment = $product->receivedpayment;
        $finalReport->status = 'approved';
        $finalReport->save();


        Product::where('id' , $product->product_id)->update([
            'quantity' => $productFindQuantity - $product->quantity,
        ]);

        $product->delete();

        return redirect('SaleReport')->with('success', 'Move to final report successfully');
    }

    public function movetosales($id)
    {
        $shoppingCart = ShoppingCart::find($id);
        // dd($shoppingCart);
        $saleRecord = new SaleRecord();
        $saleRecord->quantity = $shoppingCart->quantity;
        $saleRecord->product_id = $shoppingCart->product_id;
        $saleRecord->customer_id = $shoppingCart->customer_id;
        $saleRecord->discount = $shoppingCart->discount;
        $saleRecord->totalcost = $shoppingCart->totalcost;
        $saleRecord->receivedpayment = $shoppingCart->receivedpayment;
        $saleRecord->status = 'pending';
        $saleRecord->save();

        $shoppingCart->delete();

        return redirect('ProductAddToCart')->with('success', 'Data is moved to SalesProduct successfully');
    }

    public function search(Request $request)
    {
        $fromDate = $request->from;
        $toDate   = $request->to;
        $SaleRecord = DB::table('sale_records')->select()
        ->where('created_at', '>=', $fromDate)
        ->where('created_at', '<=', $toDate)
        ->get();
        // dd($query);
        return view('admin.salerecord.index', compact('SaleRecord'));
    }

    public function saleRecordDelete($id)
    {
        $product = SaleRecord::find($id);
        $product->delete();
        return redirect('SaleReport')->with('deleted', 'Deleted successfully');
    }

    public function inventory()
    {
        $inventory = Inventory::all();
        return view('admin.inventory.index', compact('inventory'));
    }

    public function InventoryCreate()
    {
        $products = Product::all();
        return view('admin.inventory.create', compact('products'));
    }

    public function InventoryStore(Request $request)
    {
        $productId = $request->product_id;
        $totalProducts = $request->total_products;
        $divisions = intdiv($totalProducts, 36);
        $remainder = $totalProducts % 36;

        $inventory = new Inventory;
        $inventory->product_id = $productId;
        $inventory->total_products = $totalProducts;
        $inventory->total_cotton = $divisions;
        $inventory->remaining_products = $remainder;
        $inventory->save();
        return redirect('Inventory')->with('success', 'Inventory added successfully');
        // dd("Divisions: " . $divisions . ", Remainder: " . $remainder) ;
        // dd($request->all());
    }

    public function InventoryDelete($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect('Inventory')->with('deleted', 'Inventory deleted successfully');
    }

    public function InventoryEdit($id)
    {
        $products = Product::all();
        $inventory = Inventory::find($id);
        return view('admin.inventory.edit', compact('inventory', 'products'));
    }

    public function InventoryUpdate(Request $request, $id)
    {
        $productId = $request->product_id;
        $totalProducts = $request->total_products;
        $divisions = intdiv($totalProducts, 36);
        $remainder = $totalProducts % 36;
        // dd("Divisions: " . $divisions . ", Remainder: " . $remainder);

        $inventory = Inventory::find($id);
        // dd($inventory);
        $inventory->product_id = $productId;
        $inventory->total_products = $totalProducts;
        $inventory->total_cotton = $divisions;
        $inventory->remaining_products = $remainder;
        $inventory->save();
        return redirect('Inventory')->with('success', 'Inventory updated successfully');
    }
}
