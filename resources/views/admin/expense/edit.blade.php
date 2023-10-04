@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Expense</h5>
                        <form action=" {{ url('expense/update/'.$expense->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Customer Name</label>
                                        <input type="text" value="{{ $expense->name }}" class="form-control" id="name" name="name" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Phone</label>
                                        <input type="text" value="{{ $expense->details }}" class="form-control" id="details" name="details" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Address</label>
                                        <input type="text" value="{{ $expense->amount }}" class="form-control" id="amount" name="amount" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
