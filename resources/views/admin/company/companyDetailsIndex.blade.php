@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Company Details</h5>
                            <div class="col-md-4 text-end">
                                <a href="{{ url('companiesDetails/create/') }}" class="btn btn-primary">Add Company Details</a>
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
                                        <h6 class="fw-semibold mb-0">Detail of Amount</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Company Account</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Customer Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Company Amount</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Owner Amount</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Amount</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companyDetail as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->id }}</td>
                                            <td class="border-bottom-0">{{ $item->detail_of_amount }}</td>
                                            <td class="border-bottom-0">{{ $item->company_account }}</td>
                                            <td class="border-bottom-0">{{ $item->company->name }}</td>
                                            <td class="border-bottom-0">{{ $item->company_amount }}</td>
                                            <td class="border-bottom-0">{{ $item->owner_amount }}</td>
                                            <td class="border-bottom-0">{{ $item->total_amount }}</td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('companies/edit/'.$item->id) }}"><i class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('companies/delete/'.$item->id) }}"><i class="ti ti-trash"></i></a>
                                                    <a href="{{ url('companies/viewDetails/'.$item->id) }}">View</a>
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
