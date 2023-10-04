@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit Manager</h5>
                        <form action=" {{ url('ManagersList/update/'.$manager->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Customer Name</label>
                                        <input type="text" value="{{ $manager->name }}" class="form-control" id="vendor_name" name="name" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Phone</label>
                                        <input type="text" value="{{ $manager->phone }}" class="form-control" id="quantity" name="phone" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Address</label>
                                        <input type="text" value="{{ $manager->address }}" class="form-control" id="total_amount" name="address" >
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
