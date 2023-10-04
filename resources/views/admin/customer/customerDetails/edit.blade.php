@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Customer Details</h5>
                        <form action=" {{ url('CustomersDetails/update/'.$customerDetail->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Select Manager:</label>
                                        <select name="customer_id" class="form-control select2">
                                            @foreach($customers as $role)
                                                <option value="{{ $role->id }}" {{ $customerDetail->customer_id == $role->id ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Paid Amount</label>
                                        <input type="text" value="{{ $customerDetail->paid }}" class="form-control" id="quantity" name="paid" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Remaining Amount</label>
                                        <input type="text" value="{{ $customerDetail->remaining }}" class="form-control" id="total_amount" name="remaining" >
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
