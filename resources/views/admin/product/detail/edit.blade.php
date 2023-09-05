@extends('admin/main')

@section('title', 'Product | Edit | Variants')

@section('content')
    <!-- Main -->
    <div class="container-fluid">
        <div class="app-main__inner">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Variants</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" action="/admin/product/{{ $product->id }}/detail/{{ $productDetail->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="position-relative row form-group">
                                    <label for="name" class="col-md-3 text-md-right col-form-label">Product Name</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input disabled placeholder="Product Name" type="text"
                                               class="form-control" value="{{ $product->name }}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="color"
                                           class="col-md-3 text-md-right col-form-label">Color</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="color" id="color"
                                               placeholder="Color" type="text" class="form-control" value="{{ $productDetail->color }}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="size"
                                           class="col-md-3 text-md-right col-form-label">Size</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="size" id="size"
                                               placeholder="Size" type="text" class="form-control" value="{{ $productDetail->size }}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="qty"
                                           class="col-md-3 text-md-right col-form-label">Quantity</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="qty" id="qty"
                                               placeholder="Quantity" type="text" class="form-control" value="{{ $productDetail->qty }}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 col-xl-8 offset-md-2">
                                        <a href="/admin/product/{{ $product->id }}/detail" class="border-0 btn btn-outline-danger mr-1">
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
