@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">

                        @if(Session::has('error_message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error Message</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h5 class="card-title fw-semibold mb-4">Add post</h5>
                        <form action=" {{ route('insertpost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="test" class="form-control" id="title" name="title" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Excerpt (short description)</label>
                                        <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="3"></textarea>
                                    </div>
                                        <div class="mb-3">
                                            <label for="seoTitle" class="form-label">SEO title</label>
                                            <input type="text" name="seoTitle" id="seoTitle" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="seoDescription" class="form-label">SEO Description</label>
                                            <input type="text" name="seoDescription" id="seoDescription" class="form-control">
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="seoTags" class="form-label">SEO Tags</label>
                                            <input type="text" id="seoTags" name="seoTags" class="form-control">
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Select the category</label>
                                        <select name="categories" id="category" class="form-control">
                                            @foreach ($AllCategory as $e)
                                                <option value="{{ $e->id }}">{{ $e->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tags" class="form-label">Tags</label>
                                        <input type="text" id="tags" name="postTags" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="featuredImage" class="form-label">Featured Image</label>
                                        <input type="file" id="featureImage" name="feature_image" class="form-control">
                                    </div>
                                    <input name="status" type="hidden" value="pending">
                                    <input name="user_id" type="hidden" value="{{ $LoggedInUser }}">
                                    <input name="date_of_post" type="hidden" value="{{ $todayDate }}">
                                    <input name="date_of_last_edit" type="hidden" value="{{ $todayDate }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
