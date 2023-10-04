@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
                        <form action=" {{ url('finalReport/update/'.$FinalReport->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    {{--  <div class="mb-3">
                                        <label>Select Category:</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($category as $role)
                                                <option value="{{ $role->id }}" {{ $product->category_id == $role->id ? 'selected' : '' }}>
                                                    {{ $role->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>  --}}
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Remove previous Quantity and enter return Quantity</label>
                                        <input type="text" value="{{ $FinalReport->quantity }}" class="form-control" id="quantity" name="quantity" >
                                    </div>
                                    {{--  <div class="mb-3">
                                        <label for="description" class="form-label">Product Code</label>
                                        <input type="text" value="{{ $product->product_code }}" class="form-control" id="total_amount" name="product_code" >
                                    </div>  --}}
                                </div>
                                {{--  <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Buying Price</label>
                                        <input type="text" value="{{ $product->buying_price }}" class="form-control" id="paid_amount" name="buying_price" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Selling Price</label>
                                        <input type="text" value="{{ $product->selling_price }}" class="form-control" id="paid_amount" name="selling_price" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Quantity</label>
                                        <input type="text" value="{{ $product->quantity }}" class="form-control" id="paid_amount" name="quantity" >
                                    </div>
                                </div>  --}}
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
