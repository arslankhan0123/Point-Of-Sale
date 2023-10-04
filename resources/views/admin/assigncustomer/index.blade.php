@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Managers</h5>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('AssignCustomerToManager/create') }}" class="btn btn-primary">Assign Customer to Manager</a>
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
                                        <h6 class="fw-semibold mb-0">Manager Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Customer Name</h6>
                                    </th>
                                    {{-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Remaining Payment</h6>
                                    </th> --}}
                                    <!-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th> -->
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignCustomer as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->id }}</td>
                                            <td class="border-bottom-0">{{ $item->manager->name }}</td>
                                            <td class="border-bottom-0">{{ $item->customer->name }}</td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('AssignCustomerToManager/edit/'.$item->id) }}"><i class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('AssignCustomerToManager/delete/'.$item->id) }}"><i class="ti ti-trash"></i></a>
                                                    <a href="{{ url('AssignCustomerToManager/data/view/'.$item->id) }}">View</a>
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
