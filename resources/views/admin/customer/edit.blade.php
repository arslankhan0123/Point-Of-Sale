@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Customer</h5>
                        <form action=" {{ url('Customers/update/'.$customer->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Customer Name</label>
                                        <input type="text" value="{{ $customer->name }}" class="form-control" id="vendor_name" name="name" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Phone</label>
                                        <input type="text" value="{{ $customer->phone }}" class="form-control" id="quantity" name="phone" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Address</label>
                                        <input type="text" value="{{ $customer->address }}" class="form-control" id="total_amount" name="address" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Remaining Amount</label>
                                        <input type="text" value="{{ $customer->remaining_payment }}" class="form-control" id="paid_amount" name="remaining_payment" >
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
