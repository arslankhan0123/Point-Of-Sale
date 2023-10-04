@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        @if(Session::has('error_message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Error Message</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <h5 class="card-title fw-semibold mb-4">Add Product</h5>
                        <form action=" {{ route('Inventory/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Select Product</label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option>Select Product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  <div class="mb-3">
                                        <label for="total_cotton" class="form-label">Total Bags</label>
                                        <input type="text" class="form-control" id="total_cotton" name="total_cotton" >
                                    </div>  --}}
                                    {{--  <div class="mb-3">
                                        <label for="description" class="form-label">Product Code</label>
                                        <input type="text" class="form-control" id="title" name="product_code" >
                                    </div>  --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Total Products</label>
                                        <input type="text" class="form-control" id="title" name="total_products" >
                                    </div>
                                    {{--  <div class="mb-3">
                                        <label for="description" class="form-label">Products Remaining Bags</label>
                                        <input type="text" class="form-control" id="title" name="remaining_products" >
                                    </div>  --}}
                                    {{--  <div class="mb-3">
                                        <label for="description" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" id="title" name="quantity" >
                                    </div>  --}}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
