@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">Final Sales Report</h5>
                            {{--  <div class="col-md-4 text-end">
                                <a href="{{ route('Customers/create') }}" class="btn btn-primary">Add Customer</a>
                            </div>  --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="myTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Product</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Customer</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Quantity</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Discount</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Total Cost</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Rceived Payment</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Remaining Payment</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalCost = 0; // initialize the variable for summing totalcost
                                    @endphp
                                    @foreach ($finalReport as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->products->name }}</td>
                                            <td class="border-bottom-0">{{ $item->customer ? $item->customer->name : '' }}
                                            </td>
                                            <td class="border-bottom-0">{{ $item->quantity }}</td>
                                            <td class="border-bottom-0">{{ $item->discount }}</td>
                                            <td class="border-bottom-0">{{ $item->totalcost }}</td>
                                            <td class="border-bottom-0">{{ $item->receivedpayment }}</td>
                                            <td>{{ $item->receivedpayment - (int) $item->products->selling_price * (int) $item->quantity }}
                                            </td>
                                            <td>
                                                @if ($item->status == 'pending')
                                                    <div class="badge bg-warning p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'approved')
                                                    <div class="badge bg-success p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'Reject')
                                                    <div class="badge bg-danger p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'Delete')
                                                    <div class="badge bg-primary p-2 px-3 rounded">{{ $item->status }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('finalReport/edit/' . $item->id) }}"><i
                                                            class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('finalReport/delete/' . $item->id) }}"><i
                                                            class="ti ti-trash"></i></a>
                                                </h6>
                                            </td>
                                        </tr>
                                        @php
                                            $totalCost += $item->totalcost; // add the totalcost to the sum
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="fw-semibold">Total:{{ $totalCost }}</td>
                                        <td class="fw-semibold">Received: {{$totalReceivedPayment}}</td>
                                        <td></td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="6"></td>
                                        <td class="fw-semibold">Total:{{ $totalCost }}</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            {{-- <h3 style="text-align: center">Total Cost:{{ $totalCost }}</h3>
                            <h3 style="text-align: center">Total Received Payment:{{ $totalReceivedPayment }}</h3>
                            <h3 style="text-align: center">Remaining Payment:{{ $totalCost }}</h3> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Expenses</h5>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('expense/create') }}" class="btn btn-primary">Add Expense</a>
                            </div>
                            {{-- <div class="col-md-4 text-end">
                                <a href="{{ url('companiesDetails/create/') }}" class="btn btn-primary">Add Company Details</a>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="myTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Expense Details</h6>
                                        </th>
                                        {{-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Remaining Payment</h6>
                                    </th> --}}
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Amount</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expense as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->name }}</td>
                                            <td class="border-bottom-0">{{ $item->details }}</td>
                                            <td class="border-bottom-0">{{ $item->amount }}</td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('expense/edit/' . $item->id) }}"><i
                                                            class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('expense/delete/' . $item->id) }}"><i
                                                            class="ti ti-trash"></i></a>
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
