<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AssignCustomerController;
use App\Http\Controllers\SaleRecordController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExpenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/posts', function () {
//     return view('admin.posts');
// })->middleware(['auth', 'verified'])->name('posts');



// Route::get('/addpost', function () {
//     return view('admin.addPost');
// })->middleware(['auth', 'verified'])->name('addpost');
// Route::get('/editpost', function () {
//     return view('admin.editPost');
// })->middleware(['auth', 'verified'])->name('editpost');


// Route::get('/category', function () {
//     return view('admin.category');
// })->middleware(['auth', 'verified'])->name('category');


// Route::get('/addcategory', function () {
//     return view('admin.addCategory');
// })->middleware(['auth', 'verified'])->name('addcategory');




Route::get('/users', function () {
    return view('admin.users');
})->middleware(['auth', 'verified'])->name('users');
Route::get('/addusers', function () {
    return view('admin.addUsers');
})->middleware(['auth', 'verified'])->name('addusers');
Route::get('/editusers', function () {
    return view('admin.editUsers');
})->middleware(['auth', 'verified'])->name('editusers');

Route::middleware('auth')->group(function () {

    Route::get('Category', [CategoryController::class,'category'])->name('category');
    Route::get('Category/Add_Category', [CategoryController::class,'addcategory'])->name('addcategory');
    Route::post('Category/InserCategory',[CategoryController::class,'insertcategory'])->name('insertcategory');
    Route::get('editcategory/{id}',[CategoryController::class,'editcategory'])->name('editcategory');
    Route::post('updatecategory/{id}',[CategoryController::class,'updatecategory'])->name('updatecategory');
    Route::get('deletecategory/{id}',[CategoryController::class,'deletecategory'])->name('deletecategory');


    Route::get('Posts', [PostController::class,'Posts'])->name('posts');
    Route::get('Posts/addpost', [PostController::class,'addpost'])->name('addpost');
    Route::post('Posts/Insertpost',[PostController::class,'insertpost'])->name('insertpost');
    Route::get('Post/editpost/{id}',[PostController::class,'editpost']);
    Route::post('updatepost/{id}',[PostController::class,'updatepost']);
    Route::get('Post/deletepost/{id}',[PostController::class,'deletepost'])->name('deletepost');


    Route::get('vendors', [VendorController::class,'index'])->name('vendors');
    Route::get('vendors/create', [VendorController::class,'create'])->name('vendors/create');
    Route::post('vendors/store',[VendorController::class,'store'])->name('vendors/store');
    Route::get('vendors/edit/{id}',[VendorController::class,'edit']);
    Route::post('vendors/update/{id}',[VendorController::class,'update']);
    Route::get('vendors/delete/{id}',[VendorController::class,'delete'])->name('vendors/delete/');


    Route::get('Customers', [CustomerController::class,'index'])->name('Customers');
    Route::get('Customers/create', [CustomerController::class,'create'])->name('Customers/create');
    Route::post('Customers/store',[CustomerController::class,'store'])->name('Customers/store');
    Route::get('Customers/edit/{id}',[CustomerController::class,'edit']);
    Route::post('Customers/update/{id}',[CustomerController::class,'update']);
    Route::get('Customers/delete/{id}',[CustomerController::class,'delete'])->name('Customers/delete/');
    Route::get('Customers/data/view/{id}', [CustomerController::class,'view'])->name('Customers/data/view');
    Route::get('Customers/data/delete/{id}', [CustomerController::class,'CustomersDataDelete'])->name('Customers/data/delete/');

    Route::get('CustomersDetails', [CustomerController::class,'CustomersDetails'])->name('CustomersDetails');
    Route::get('CustomersDetails/create', [CustomerController::class,'CustomersDetailsCreate'])->name('CustomersDetails/create');
    Route::post('CustomersDetails/store',[CustomerController::class,'CustomersDetailsStore'])->name('CustomersDetails/store');
    Route::get('Customers/data/details/{id}', [CustomerController::class,'CustomersDataDetails'])->name('Customers/data/details/');
    Route::get('CustomersDetails/edit/{id}',[CustomerController::class,'CustomersDetailsEdit']);
    Route::post('CustomersDetails/update/{id}',[CustomerController::class,'CustomersDetailsUpdate']);
    Route::post('/GetCustomerId', [CustomerController::class,'CustomerId'])->name('GetCustomerId');


    Route::get('Products', [ProductController::class,'index'])->name('Products');
    Route::get('Products/create', [ProductController::class,'create'])->name('Products/create');
    Route::post('Products/store',[ProductController::class,'store'])->name('Products/store');
    Route::get('Products/edit/{id}',[ProductController::class,'edit']);
    Route::post('Products/update/{id}',[ProductController::class,'update']);
    Route::get('Products/delete/{id}',[ProductController::class,'delete'])->name('Products/delete/');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
    Route::get('shoppingcart', [ProductController::class, 'shoppingcart'])->name('shoppingcart');
    Route::get('incrementQty/{id}', [ProductController::class, 'incrementQty'])->name('incrementQty');
    Route::get('decrementQty/{id}', [ProductController::class, 'decrementQty'])->name('decrementQty');
    Route::get('addtocart/delete/{id}', [ProductController::class, 'deleteAddToCart'])->name('addtocart/delete/');

    Route::get('Products/ReturnProducts', [ProductController::class,'ReturnProducts'])->name('ReturnProducts');
    Route::get('Products/ReturnProductsCreate', [ProductController::class,'ReturnProductCreate'])->name('ReturnProducts/create');
    Route::post('Products/ReturnProductStore',[ProductController::class,'ReturnProductStore'])->name('ReturnProduct/Store');
    Route::get('ReturnProducts/delete/{id}',[ProductController::class,'ReturnProductsDelete'])->name('ReturnProducts/delete/');


    Route::get('/transfer-data', [ProductController::class, 'transferData'])->name('transferData');
    Route::post('/transfer-data', [ProductController::class, 'transferData'])->name('transfer-data');
    Route::post('/customerstore', [ProductController::class, 'customerStore'])->name('customer.store');
    Route::get('/ProductAddToCart', [ProductController::class, 'ProductAddToCart'])->name('addtocartproducts');


    Route::get('ManagersList', [ManagerController::class, 'index'])->name('ManagersList');
    Route::get('ManagersList/create', [ManagerController::class, 'create'])->name('ManagersList/create');
    Route::post('ManagersList/store',[ManagerController::class,'store'])->name('ManagersList/store');
    Route::get('ManagersList/edit/{id}',[ManagerController::class,'edit']);
    Route::post('ManagersList/update/{id}',[ManagerController::class,'update']);
    Route::get('ManagersList/delete/{id}',[ManagerController::class,'delete'])->name('ManagersList/delete/');


    Route::get('companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies/create');
    Route::post('companies/store',[CompanyController::class,'store'])->name('companies/store');
    Route::get('companies/edit/{id}',[CompanyController::class,'edit']);
    Route::post('companies/update/{id}',[CompanyController::class,'update']);
    Route::get('companies/delete/{id}',[CompanyController::class,'delete'])->name('companies/delete/');
    Route::get('companies/viewDetails/{id}', [CompanyController::class,'view'])->name('companies/viewDetails/');



    Route::get('CompanyDetails',[CompanyDetailController::class,'CompanyDetails'])->name('CompanyDetails');
    Route::get('companiesDetails/create/', [CompanyDetailController::class, 'create'])->name('companiesDetails/create/');
    Route::post('companyDetails/store/',[CompanyDetailController::class,'store'])->name('companyDetails/store/');


    Route::get('AssignCustomerToManager', [AssignCustomerController::class, 'index'])->name('AssignCustomerToManager');
    Route::get('AssignCustomerToManager/create', [AssignCustomerController::class, 'create'])->name('AssignCustomerToManager/create');
    Route::post('AssignCustomerToManager/store',[AssignCustomerController::class,'store'])->name('AssignCustomerToManager/store');
    Route::get('AssignCustomerToManager/edit/{id}',[AssignCustomerController::class,'edit']);
    Route::post('AssignCustomerToManager/update/{id}',[AssignCustomerController::class,'update']);
    Route::get('AssignCustomerToManager/delete/{id}',[AssignCustomerController::class,'delete'])->name('AssignCustomerToManager/delete/');
    Route::get('AssignCustomerToManager/data/view/{id}', [AssignCustomerController::class,'view'])->name('AssignCustomerToManager/data/view/');


    Route::get('SaleReport', [SaleRecordController::class, 'index'])->name('SaleReport');
    Route::post('searchdates', [SaleRecordController::class, 'search'])->name('search');
    Route::post('storeStatus', [SaleRecordController::class, 'storeStatus'])->name('storeStatus');
    Route::get('movetosales/{id}',[SaleRecordController::class,'movetosales'])->name('movetosales');
    Route::get('finalMove/{id}',[SaleRecordController::class,'finalMove'])->name('finalMove');
    Route::get('saleRecordDelete/{id}',[SaleRecordController::class,'saleRecordDelete'])->name('saleRecordDelete');
    Route::get('finalReport', [SaleRecordController::class, 'finalReport'])->name('finalReport');
    Route::get('finalReport/delete/{id}',[SaleRecordController::class,'finalReportDelete'])->name('finalReport/delete/');
    Route::get('finalReport/edit/{id}',[SaleRecordController::class,'finalReportEdit'])->name('finalReport/edit/');
    Route::post('finalReport/update/{id}',[SaleRecordController::class,'finalReportUpdate']);

    Route::get('Inventory', [SaleRecordController::class, 'inventory'])->name('inventory');
    Route::get('Inventory/create', [SaleRecordController::class,'InventoryCreate'])->name('Inventory/create');
    Route::post('Inventory/store',[SaleRecordController::class,'InventoryStore'])->name('Inventory/store');
    Route::get('Inventory/delete/{id}',[SaleRecordController::class,'InventoryDelete'])->name('Inventory/delete/');
    Route::get('Inventory/edit/{id}',[SaleRecordController::class,'InventoryEdit']);
    Route::post('Inventory/update/{id}',[SaleRecordController::class,'InventoryUpdate']);


    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
    Route::get('/export-table', [ExportController::class, 'exportTable'])->name('export.table');

    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');
    Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense/create');
    Route::post('expense/store',[ExpenseController::class,'store'])->name('expense/store');
    Route::get('expense/edit/{id}',[ExpenseController::class,'edit']);
    Route::post('expense/update/{id}',[ExpenseController::class,'update']);
    Route::get('expense/delete/{id}',[ExpenseController::class,'delete']);



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
