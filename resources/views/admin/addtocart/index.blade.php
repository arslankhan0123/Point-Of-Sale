@extends('admin.layout.layout')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <div class="col-md-4 text-end">
                                
                                {{-- <a href="{{ url('/transfer-data') }}" class="btn btn-primary">Transfer Data</a> --}}
                                {{-- <a href="{{ route('Products/create') }}" class="btn btn-primary">Add Product</a> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-9">
                                    <form method="post" action="{{ url('customerstore') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-3">
                                            <select class="form-select col-md-1" name="employee_id" id="employee_id" aria-label="Default select example">
                                                <option>Select Customer</option>
                                                @foreach ($customers as $e)
                                                    <option value="{{ $e->id }}">{{ $e->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-select" id="discount" name="discount" placeholder="Enter Discount If any:" >
                                            </div>
                                            {{-- <div class="col-sm-3">
                                                <input type="text" class="" id="discount" name="totalcost" value="Total cost is: {{$total}}" >
                                            </div> --}}
                                            <div class="col-sm-3">
                                                <input type="text" class="form-select" id="discount" name="receivedpayment" placeholder="Enter Received Payment:" >
                                            </div>
                                            <div class="col-sm-3">
                                                <button class="form-select" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    <a href="{{ url('invoices') }}" class="btn btn-primary">View Invoices</a>
                                    <a href="{{ url('/export-table') }}" class="btn btn-primary">Export</a>
                                </div>
                                {{--  <div class="col-sm-3">
                                    <form action="{{ route('transfer-data') }}" method="POST">
                                        @csrf
                                        <button type="submit">Transfer Data</button>
                                    </form>
                                </div>  --}}
                            </div>
                            <h1 style="text-align: center"><b>SKY TRADERS</b></h1>
                            <h5 style="text-align: center"><b>Okara Pakistan</b></h5>
                            <p style="text-align: center; font-weight:100"><b>03044627900</b></p>
                            <h3 style="text-align: center; font-weight:100"><b>SALE INVOICE</b></h3>
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
                                        <h6 class="fw-semibold mb-0">Discount</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Total Price</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Rceived Payment</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Remaining Payment</h6>
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
                                            <td class="border-bottom-0">{{ $row->customer ? $row->customer->name : '' }}</td>
                                            <td class="border-bottom-0">{{ $row->products->selling_price }}</td>
                                            <td class="border-bottom-0">{{ $row->discount }}</td>
                                            <td class="border-bottom-0">{{ $row->totalcost}}</td>
                                            <td class="border-bottom-0">{{ $row->receivedpayment }}</td>
                                            <td>{{ $row->receivedpayment - ((int)$row->products->selling_price * (int)$row->quantity)}}</td>
                                            {{--  <td class="border-bottom-0">{{ $remainingPayment }}</td>  --}}
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('addtocart/delete/'.$row->id) }}"><i class="ti ti-trash"></i></a>
                                                    <a href="{{ url('movetosales/'.$row->id) }}">Move</a>
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col">
                                    <h4 style="text-align: right">Total Discount: {{$discount}}</h4>
                                </div>
                                <div class="col">
                                    <h4 style="text-align: left">Total Amount: {{$total}}</h4>
                                </div>
                                <div class="col">
                                    {{-- @foreach ($data as $row) --}}
                                        {{--  <h4 style="text-align: left">Received Amount: {{$row->receivedpayment}}</h4>  --}}
                                    {{-- @endforeach --}}
                                </div>
                                <div class="col">
                                    {{--  <h4 style="text-align: left">Remaining Amount: {{$remainingPayment}}</h4>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

<script>
    $(document).on('change', '#employee_id', function() {
    var customer_id = $("#employee_id").val();
    console.log('my value',customer_id )
    $.ajax({
        url: "{{ url('GetCustomerId',"id") }}",
        type: "post",
        headers: {
            'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0]
                .getAttributeNode('content').value,
        },
        data: {
            customer_id: customer_id
        },

        dataType: "json",
            success: function(data) {
                //console.log(data);
                if (data != "" && data != null) {
                    $("#emp_leave_types").empty();
                    $.each(data.setempId, function(key, value) {
                        $("#emp_leave_types").append('<option value="' + value.id + '">' +
                            value.title +' '+ value.days + '</option>');
                    });
                } else {
                    $('select[name="sub_topic_v2"]').empty();
                }
            }
    });

});
</script>
