@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <div class="row justify-space-between">
                            <h5 class="card-title fw-semibold mb-4 col-md-8">All Posts</h5>
                           <div class="col-md-4 text-end">
                               <a href="{{ route('addpost') }}" class="btn btn-primary">Add Post</a>
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
                                        <h6 class="fw-semibold mb-0">Title</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">User</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Category</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Date</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allpost as $item)
                                        <tr>
                                            <td class="border-bottom-0">{{ $item->id }}</td>
                                            <td class="border-bottom-0">{{ $item->title }}</td>
                                            <td class="border-bottom-0">{{ $item->user->name }}</td>
                                            <td class="border-bottom-0">{{ $item->category->title }}</td>
                                            <td>
                                                @if ($item->status == 'Pending')
                                                    <div class="badge bg-warning p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'Approved')
                                                    <div class="badge bg-success p-2 px-3 rounded">{{ $item->status }}</div>
                                                @elseif($item->status == 'Decline')
                                                <div class="badge bg-danger p-2 px-3 rounded">{{ $item->status }}</div>
                                                @endif
                                            </td>
                                            <td class="border-bottom-0">{{ $item->date_of_post }}</td>

                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 fs-4">
                                                    <a href="{{ url('Post/editpost/'.$item->id) }}"><i class="ti ti-pencil"></i></a>
                                                    <a href="{{ url('Post/deletepost/'.$item->id) }}"><i class="ti ti-trash"></i></a>
                                                </h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{--  <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                                        <span class="fw-normal">Project Manager</span>
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
                                        <h6 class="fw-semibold mb-0 fs-4">$24.5k</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4"><a href="edit"><i class="ti ti-pencil"></i></a>&nbsp;&nbsp;<a href="edit"><i class="ti ti-trash"></i></a></h6>
                                    </td>
                                </tr>  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
