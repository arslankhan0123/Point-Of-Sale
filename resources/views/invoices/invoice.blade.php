<style>
    .invoice-container {
        font-family: Arial, sans-serif;
        width: 800px;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 20px;
    }

    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .brand-name {
        font-size: 30px;
        font-weight: bold;
    }

    .invoice-number {
        font-size: 16px;
    }

    .invoice-address {
        font-size: 16px;
        margin-top: 10px;
    }

    .customer-details {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .customer-name {
        font-size: 18px;
        font-weight: bold;
    }

    .customer-phone {
        font-size: 16px;
    }

    .date-software {
        margin-top: 20px;
        font-size: 16px;
    }

    .product-table {
        margin-top: 40px;
        width: 70%;
        border-collapse: collapse;
    }

    .product-table th {
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .product-table td {
        border: 1px solid #ccc;
        padding: 10px;
    }

    .total-details {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-label {
        font-size: 18px;
        font-weight: bold;
    }

    .total-amount {
        font-size: 16px;
    }
</style>



{{-- <h1 style="text-align: center"><b>SKY TRADERS</b></h1>
<h5 style="text-align: center"><b>Okara Pakistan,03044627900</b></h5>
<h3 style="text-align: center; font-weight:100"><b>SALE INVOICE</b></h3> --}}


{{-- @foreach ($data as $key => $item)
<b style="font-size: 30px">Product:{{ $key + 1 }}</b>
<b>Customer:</b>{{ $item->customer->name }}
<b>Customer:</b>{{ $item->products->name }}
<b>Quantity:</b>{{ $item->quantity }}
<b>Discount:</b>{{ $item->discount }}
<b>Selling Price:</b>{{ $item->products->selling_price }}
<b>Total Price:</b>{{ ((int)$item->products->selling_price * (int)$item->quantity)}}
<b>Received Payment:</b>{{ $item->receivedpayment }}<br><br><br>
@endforeach --}}

<div class="invoice-container">
    {{-- <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
        <img src="{{ url('admin/assets/WhatsApp Image 2023-05-03 at 23.21.19.jpg') }}" width="50" style="text-align: center"
            alt="">
    </a> --}}
    <div class="invoice-header">
        <div class="brand-name">Umeed Enterprises</div>
        <div class="invoice-number">(SOL Jasmine Tissues)</div>
    </div>
    <div class="invoice-address">
        Zaheer Block, College 2 Road
        Near Chungi No 6
        Okara
    </div>
    <div class="invoice-address">
        Sajid Mahmood: 03155407444
        Kanwar Waseem: 03004813719
    </div>
    <div class="customer-details">
        @foreach ($data as $key => $item)
            <div class="customer-name">{{ $item->customer->name }}</div>
        @break
    @endforeach
</div>
<div class="date-software">
    Date: 2023-04-29<br>
    Software developed by DEVTECH Pro<br>
    Phone: (341) 759-9865
</div>
<table class="product-table">
    <thead>
        <tr>
            <th>Sr:</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Selling</th>
            <th>Total</th>
            <th>Received</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->customer->name }}</td>
                <td>{{ $item->products->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->discount }}</td>
                <td>{{ $item->products->selling_price }}</td>
                <td>{{ (int) $item->products->selling_price * (int) $item->quantity }}
                </td>
                <td>{{ $item->receivedpayment }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="total-details">
    <div class="total-label">Total:</div>
    <div class="total-amount">{{ $totalCost }}</div>
</div>
@foreach ($data as $item)
    <div class="total-details">
        <div class="total-label">Discount:</div>
        <div class="total-amount">{{ $item->discount }}</div>
    </div>
    <div class="total-details">
        <div class="total-label">Grand Total:</div>
        <div class="total-amount">{{ $totalCost - $item->discount }}</div>
    </div>
@break
@endforeach
</div>

{{-- <table class="product-table">
<thead>
  <tr>
    <th>Sr:</th>
    <th>Customer</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Discount</th>
    <th>Selling</th>
    <th>Total</th>
    <th>Received</th>
  </tr>
</thead>
<tbody>
    @foreach ($data as $key => $item)
  <tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $item->customer->name }}</td>
    <td>{{ $item->products->name }}</td>
    <td>{{ $item->quantity }}</td>
    <td>{{ $item->discount }}</td>
    <td>{{ $item->products->selling_price }}</td>
    <td>{{ ((int)$item->products->selling_price * (int)$item->quantity)}}</td>
    <td>{{ $item->receivedpayment }}</td>
  </tr>
  @endforeach
</tbody>
</table> --}}
