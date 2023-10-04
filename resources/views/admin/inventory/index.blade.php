@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Inventory</h5>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('Inventory/create') }}" class="btn btn-primary">Add Inventory</a>
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
                                        <h6 class="fw-semibold mb-0">Total Products</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Bags</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Products Remaining Bags</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->products->name  }}</td>
                                            <td class="border-bottom-0">{{ $item->total_products }}</td>
                                            <td class="border-bottom-0">{{ $item->total_cotton }}</td>
                                            <td class="border-bottom-0">{{ $item->remaining_products}}</td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('Inventory/edit/'.$item->id) }}"><i class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('Inventory/delete/'.$item->id) }}"><i class="ti ti-trash"></i></a>
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
