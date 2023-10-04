@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Products</h5>
                            <div class="col-md-4 text-end">
                                <form action="{{ route('transfer-data') }}" method="POST">
                                    @csrf
                                    <button type="submit">Transfer Data</button>
                                </form>
                                {{-- <a href="{{ url('/transfer-data') }}" class="btn btn-primary">Transfer Data</a> --}}
                                {{-- <a href="{{ route('Products/create') }}" class="btn btn-primary">Add Product</a> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="myTable">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Product Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Quantity</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Customer</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Selling Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="border-bottom-0">{{ $row->products->name }}</td>
                                            <td class="border-bottom-0">
                                                <a href="{{url('decrementQty/'.$row->id)}}" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                    <span class="m-auto text-2xl font-thin">-</span>
                                                </a>
                                                <span>{{ $row->quantity }}</span>
                                                <a href="{{url('incrementQty/'.$row->id)}}" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                    <span class="m-auto text-2xl font-thin">+</span>
                                                </a>
                                            </td>
                                            <td class="border-bottom-0">{{ $row->customer->name }}</td>
                                            <td class="border-bottom-0">{{ $row->products->selling_price }}</td>
                                            <td class="border-bottom-0">{{ ((int)$row->products->selling_price * (int)$row->quantity)}}</td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('Products/delete/'.$row->id) }}"><i class="ti ti-trash"></i>Delete</a>
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h3 style="text-align: right">Total Amount: {{$total}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
