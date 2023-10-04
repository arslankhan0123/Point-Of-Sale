@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit User</h5>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="title" name="title" >
                                    </div>
                                    <div class="mb-3">

                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" class="form-control">
                                    </div>
                                      <div class="mb-3">

                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="profileImage" class="form-label">Profile Image</label>
                                        <input type="file" id="profileImage" class="form-control" accept=".png,.jpg">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="title" name="title" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="title" name="title" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-control" name="" id="role">
                                            <option value="Admin">Admin</option>
                                            <option value="Editor">Editor</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Status</label>
                                        <select class="form-control" name="" id="role">
                                            <option value="Pending">Pending</option>
                                            <option value="Approve">Approved</option>
                                            <option value="Deactivate">Deactivate</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
