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
                        <h5 class="card-title fw-semibold mb-4">Add Customer Details</h5>
                        <form action=" {{ route('CustomersDetails/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Select Customer</label>
                                        <select name="customer_id">
                                            @foreach($customers as $customer)
                                                <option class="form-control" value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Paid Amount</label>
                                        <input type="text" class="form-control" id="title" name="paid" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Remaining Payment</label>
                                        <input type="text" class="form-control" id="title" name="remaining" >
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="description" class="form-label">Remaining Payment</label>
                                        <input type="text" class="form-control" id="title" name="remaining_payment" >
                                    </div> --}}
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
