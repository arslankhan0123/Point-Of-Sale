@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Vendor</h5>
                        <form action=" {{ url('vendors/update/'.$vendor->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Vendor Name</label>
                                        <input type="text" value="{{ $vendor->vendor_name }}" class="form-control" id="vendor_name" name="vendor_name" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Quantity</label>
                                        <input type="text" value="{{ $vendor->quantity }}" class="form-control" id="quantity" name="quantity" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Total Amount</label>
                                        <input type="text" value="{{ $vendor->total_amount }}" class="form-control" id="total_amount" name="total_amount" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Paid Amount</label>
                                        <input type="text" value="{{ $vendor->paid_amount }}" class="form-control" id="paid_amount" name="paid_amount" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
