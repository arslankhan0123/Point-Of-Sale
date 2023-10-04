@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Vendors</h5>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('vendors/create') }}" class="btn btn-primary">Add Vendors</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="myTable">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Vendor Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Quantity</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Amount</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Paid Amount</h6>
                                    </th>
                                    <!-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th> -->
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendor as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->id }}</td>
                                            <td class="border-bottom-0">{{ $item->vendor_name }}</td>
                                            <td class="border-bottom-0">{{ $item->quantity }}</td>
                                            <td class="border-bottom-0">{{ $item->total_amount }}</td>
                                            <td class="border-bottom-0">{{ $item->paid_amount }}</td>
                                            <!-- <td>
                                                @if ($item->status == 'Pending')
                                                    <div class="badge bg-warning p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'Approved')
                                                    <div class="badge bg-success p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'Decline')
                                                <div class="badge bg-danger p-2 px-3 rounded">{{ $item->status }}</div>
                                                @endif
                                            </td> -->

                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('vendors/edit/'.$item->id) }}"><i class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('vendors/delete/'.$item->id) }}"><i class="ti ti-trash"></i></a>
                                                </h6>
                                            </td>
                                        </tr>
                                        {{--  <tr>
                                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-success rounded-3 fw-semibold">Approved</span>
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4"><a href="edit"><i class="ti ti-pencil"></i></a>&nbsp;&nbsp;<a href="edit"><i class="ti ti-trash"></i></a></h6>
                                            </td>
                                        </tr>  --}}
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
