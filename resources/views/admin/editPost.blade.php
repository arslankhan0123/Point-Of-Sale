@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Edit post</h5>
                        <form action=" {{ url('updatepost/'.$Post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" value="{{ $Post->title }}" class="form-control" id="title" name="title" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="3">{{ $Post->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Excerpt (short description)</label>
                                        <textarea name="excerpt" class="form-control" id="excerpt" cols="30" rows="3">{{ $Post->excerpt }}</textarea>
                                    </div>
                                        <div class="mb-3">
                                            <label for="seoTitle" class="form-label">SEO title</label>
                                            <input type="text" name="seo_title" value="{{ $Post->seo_title }}" id="seoTitle" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="seoDescription" class="form-label">SEO Description</label>
                                            <input type="text" name="seo_description" value="{{ $Post->seo_description }}" id="seoDescription" class="form-control">
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="seoTags" class="form-label">SEO Tags</label>
                                            <input type="text" name="seo_tags" value="{{ $Post->seo_tags }}" id="seoTags" name="seoTags" class="form-control">
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
                                        <input type="text" value="{{ $Post->tags }}" id="tags" name="postTags" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="featuredImage" class="form-label">Featured Image</label>
                                        <input type="file" name="feature_image" id="featureImage" class="form-control" accept=".png,.jpg">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Posts Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Decline">Declined</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
