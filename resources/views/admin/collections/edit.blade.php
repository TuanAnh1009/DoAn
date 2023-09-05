@extends('admin/main')

@section('title', 'Collections | Edit')

@section('content')
    <!-- Main -->
    <div class="container-fluid">
        <div class="app-main__inner">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Collections</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="/admin/collections/{{$collections->id}}">
                                @csrf
                                @method('PUT')

                                <div class="position-relative row form-group">
                                    <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="name" id="name" placeholder="Name" type="text"
                                               class="form-control" value="{{$collections->name}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="description" id="description" placeholder="Description" type="text"
                                               class="form-control" value="{{$collections->description}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="content" class="col-md-3 text-md-right col-form-label">Content</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="content" id="content" placeholder="Content" type="text"
                                               class="form-control" value="{{$collections->content}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="image"
                                           class="col-md-3 text-md-right col-form-label">Image</label>
                                    <div class="col-md-9 col-xl-8">
                                        <img style="height: 200px; cursor: pointer;"
                                             class="thumbnail" data-toggle="tooltip"
                                             title="Click to change the image" data-placement="bottom"
                                             src="/img/collections/{{ $collections->avatar }}" alt="Image">
                                        <input name="image" type="file" onchange="changeImg(this)"
                                               class="image form-control-file" style="display: none;" value="">
                                        <input type="hidden" name="image_old" value="{{ $collections->avatar }}">
                                        <small class="form-text text-muted">
                                            Click on the image to change (required)
                                        </small>
                                    </div>
                                </div>

                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                        <a href="/admin/collections" class="border-0 btn btn-outline-danger mr-1">
                                                            <span class="btn-icon-wrapper pr-1 opacity-8">
                                                                <i class="fa fa-times fa-w-20"></i>
                                                            </span>
                                            <span>Cancel</span>
                                        </a>

                                        <button type="submit"
                                                class="btn-shadow btn-hover-shine btn btn-primary">
                                                            <span class="btn-icon-wrapper pr-2 opacity-8">
                                                                <i class="fa fa-download fa-w-20"></i>
                                                            </span>
                                            <span>Save</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
