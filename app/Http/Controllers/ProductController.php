<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\FinalReport;
use App\Models\ShoppingCart;
use App\Models\Customer;
use App\Models\ReturnProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $total = 0; $sub_total = 0; $tax = 0;
        $data = ShoppingCart::all();
        
        $total = $sub_total - $tax;
        $product = Product::all();
        $customers = Customer::all();
        return view('admin.product.index', compact('product', 'data', 'total', 'sub_total', 'tax', 'customers'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function store(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'product_code' => 'required',
                'buying_price' => 'required',
                'selling_price' => 'required',
                'quantity' => 'required',
                'category_id' => 'required',
            ];

            $CustomMessage = [
                'name.required' => 'Product name is required',
                'quantity.required' => 'Quantity is required',
                'buying_price.required' => 'Buying Price is required',
                'selling_price.required' => 'Selling Price is required',
                'category_id.required' => 'Category is required',
                'product_code.required' => 'Product Code is required',
            ];
            $this->validate($request, $rules, $CustomMessage);


            $product = new Product;
            $product->name = $request->name;
            $product->product_code = $request->product_code;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category_id;
            $product->status = 'pending';
            $product->save();
            return redirect('Products')->with('success',"Product added successfully");
            notify()->success('Laravel Notify is awesome!');
        }
        return view('admin.product.create');
    }

    public function edit($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('Products')->with('success',"Product updated successfully");
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('deleted',"Product deleted Successfully");
    }

    public function addToCart($id)
    {   
        if(Auth::user()){
            // $data = [
            //     'product_id' => $id,
            // ];
            // // dd($data);
            // ShoppingCart::updateOrCreate($data);

            $product = Product::find($id);

            $addToCart = new ShoppingCart;
            $addToCart->quantity = '1';
            $addToCart->product_id = $product->id;
            $addToCart->totalcost = $product->selling_price * 1;
            $addToCart->status = $product->status;
            $addToCart->save();
            return redirect('Products')->with('success',"Product add to cart successfully");
        }
        else{
            return redirect(route('login'));
        }
    }

    public function shoppingcart()
    {
        $total = 0; $sub_total = 0; $tax = 0;
        $data = ShoppingCart::all();
        foreach ($data as $item) {
            $sub_total +=  $item->products->selling_price * $item->quantity;
        }
        $total = $sub_total - $tax;
        // dd($total);
        return view('admin.shoppingcart.index', compact('data', 'total', 'sub_total', 'tax'));
    }

    public function incrementQty($id)
    {
        // $product = new Product;
        // dd($product);
        // $shoppingCart = ShoppingCart::all();
        $shoppingCart = ShoppingCart::findOrFail($id);
        // dd($shoppingCart->quantity < $shoppingCart->products->quantity);
        if($shoppingCart->quantity < $shoppingCart->products->quantity){
            $increase = $shoppingCart->quantity + 1;
            $shoppingCart->quantity = $increase;
            $shoppingCart->totalcost = $increase * $shoppingCart->products->selling_price;
            // dd($shoppingCart->totalcost);
            $shoppingCart->save();

            // $productQuantity = $shoppingCart->products->quantity;
            // Product::where('id' , $shoppingCart->product_id)->update([
            //     'quantity' => $productQuantity-1,
            // ]);
            return redirect('ProductAddToCart')->with('success',"Product quality updated successfully");
        }
        else{
            return redirect('ProductAddToCart')->with('deleted',"You don't have more product!");
        }
        
        // return view('admin.shoppingcart.index', compact('shoppingCart'));
    }

    public function decrementQty($id)
    {
        $shoppingCart = ShoppingCart::findOrFail($id);
        if($shoppingCart->quantity > 1){
            $increase = $shoppingCart->quantity - 1;
            $shoppingCart->quantity = $increase;
            $shoppingCart->totalcost = $increase * $shoppingCart->products->selling_price;
            // dd($shoppingCart->totalcost);
            $shoppingCart->save();


            // $productQuantity = $shoppingCart->products->quantity;
            // Product::where('id' , $shoppingCart->product_id)->update([
            //     'quantity' => $productQuantity+1,
            // ]);
            return redirect('ProductAddToCart')->with('success',"Product quality updated successfully");
        }
        else{
            return redirect('ProductAddToCart')->with('deleted',"You cannot have less then 1 quantity");
        }
    }

    // public function transferData()
    // {
    //     // Get data from source table
    //     $sourceData = DB::table('shopping_carts')->get();

    //     // Convert collection to array
    //     $dataArray = $sourceData->toArray();

    //     // Insert data into destination table
    //     DB::table('sale_records')->insert($dataArray);

    //     // Delete transferred data from source table
    //     DB::table('shopping_carts')->delete();

    //     // Redirect back to previous page or to a confirmation page
    //     return redirect()->back()->with('success', 'Data transferred successfully!');
    // }

    // public function transferData()
    // {
    //     // Get data from source table
    //     $sourceData = DB::table('pending_carts')->get();

    //     foreach ($sourceData as $data) {
    //         // Insert row into destination table
    //         DB::table('sale_records')->insert((array)$data);

    //         // Delete transferred row from source table
    //         DB::table('shopping_carts')->where('id', $data->id)->delete();
    //     }

    //     // Redirect back to previous page or to a confirmation page
    //     return redirect()->back()->with('success', 'Data transferred successfully!');
    // }

    public function transferData()
    {
        // Get data from source table
        $sourceData = DB::table('shopping_carts')->get();

        foreach ($sourceData as $data) {
            // Insert row into destination table
            DB::table('sale_records')->insert((array)$data);

            // Delete transferred row from source table
            DB::table('shopping_carts')->where('id', $data->id)->delete();
        }

        // Redirect back to previous page or to a confirmation page
        return redirect()->back()->with('success', 'Data transferred successfully!');
    }


    public function customerStore(Request $request)
    {
        // dd($request->discount);
        $customer_id = $request->input('employee_id');
        $shopingCarts = ShoppingCart::all();
        
        foreach ($shopingCarts as $product) {
            $product->customer_id = $customer_id;
            $product->discount = $request->discount;
            $product->receivedpayment = $request->receivedpayment;
            $product->save();
        }

        return redirect('ProductAddToCart')->with('success', 'Customer assigned to products successfully');
    }

    public function deleteAddToCart($id)
    {
        $product = ShoppingCart::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('deleted',"Add to cart Product deleted Successfully");
    }

    public function ProductAddToCart()
    {
        $total = 0; $sub_total = 0; $tax = 0; $discount = 0;
        $data = ShoppingCart::all();
        $shopingCartFirstProduct = ShoppingCart::first();
        // dd($shopingCartFirstProduct);
        foreach ($data as $item) {
            $sub_total +=  $item->products->selling_price * $item->quantity;
            $discount = $item->discount;
            $receivedpayment = $item->receivedpayment;
        }
        $total = $sub_total - $tax - $discount;
        // $remainingPayment = $total - $receivedpayment;
        $product = Product::all();
        $customers = Customer::all();
        return view('admin.addtocart.index', compact('product', 'data', 'total', 'sub_total', 'tax', 'customers', 'discount'));
    }

    public function ReturnProducts()
    {
        $returnProduct = ReturnProduct::all();
        return view('admin.product.returnproducts.index', compact('returnProduct'));
    }

    public function ReturnProductCreate()
    {
        $product = Product::all();
        $customers = Customer::all();
        return view('admin.product.returnproducts.create', compact('product', 'customers'));
    }

    public function ReturnProductStore(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::find($productId);
        $productQuantity = $product->quantity;
        $customerId = $request->customer_id;
        
        $returnQuantity = $request->quantity;
        $returnProduct = new ReturnProduct;
        $returnProduct->product_id = $request->product_id;
        $returnProduct->quantity = $returnQuantity;
        $returnProduct->save();

        $productQuantityIncreased = $productQuantity + $returnQuantity;
        Product::where('quantity' , $productQuantity)->update([
            'quantity' => $productQuantityIncreased,
        ]);

        $finalProduct = FinalReport::where('product_id' , $request->product_id)->where('customer_id', $customerId)->latest()->first();
        $setProductQuantity = $finalProduct->quantity - $request->quantity;
        $finalProduct->quantity = $setProductQuantity;
        $finalProduct->totalcost = $setProductQuantity * $product->selling_price;
        $finalProduct->save();
        // dd($product);

        return redirect('Products/ReturnProducts')->with('success', 'ReturnProduct added successfully');
    }

    public function ReturnProductsDelete($id)
    {
        $returnProduct = ReturnProduct::find($id);
        $returnProduct->delete();
        return redirect('Products/ReturnProducts')->with('deleted', 'ReturnProduct deleted successfully');
    }
}
