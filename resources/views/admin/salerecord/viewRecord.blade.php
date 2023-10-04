@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">Sales Report</h5>
                            <form action="{{url('searchdates')}}" method="POST">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="form-group row">
                                                <label class="col-form-lable col-sm-2">From</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control input-sm" id="from" name="from" />
                                                </div>

                                                <label class="col-form-lable col-sm-2">To</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control input-sm" id="to" name="to" />
                                                </div>

                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn" name="search" title="search">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="col-md-4 text-end">
                                <a href="{{ route('ManagersList/create') }}" class="btn btn-primary">Add Manager</a>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle" id="myTable">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Customer Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Product Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Category Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Buying Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Sale Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Quantity</h6>
                                    </th>
                                    {{-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Remaining Payment</h6>
                                    </th> --}}
                                    <!-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th> -->
                                    {{-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($query as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->customer->name }}</td>
                                            <td class="border-bottom-0">{{ $item->products->name }}</td>
                                            <td class="border-bottom-0">{{ $item->products->category->title }}</td>
                                            <td class="border-bottom-0">{{ $item->products->buying_price }}</td>
                                            <td class="border-bottom-0">{{ $item->products->selling_price }}</td>
                                            <td class="border-bottom-0">{{ $item->products->quantity }}</td>
                                            {{-- <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('ManagersList/edit/'.$item->id) }}"><i class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('ManagersList/delete/'.$item->id) }}"><i class="ti ti-trash"></i></a>
                                                    <a href="{{ url('ManagersList/data/view/'.$item->id) }}">View</a>
                                                </h6>
                                            </td> --}}
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
