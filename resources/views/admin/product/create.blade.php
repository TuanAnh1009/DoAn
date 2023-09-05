@extends('admin/main')

@section('title', 'Product | Create')

@section('style')
    <link href="/css/admin/css/custom.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
<!-- Main -->
<div class="container-fluid">
    <div class="app-main__inner">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="/admin/product" enctype="multipart/form-data">
                            @csrf

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                           class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="brand_id"
                                       class="col-md-3 text-md-right col-form-label">Brand</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="brand_id" id="brand_id" class="form-control">
                                        <option value="">-- Brand --</option>

                                        @foreach($brands as $brand)
                                        <option value={{ $brand->id }}>
                                            {{ $brand->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                       class="col-md-3 text-md-right col-form-label">Collections</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="product_category_id" id="product_category_id" class="form-control">
                                        <option value="">-- Collections --</option>

                                        @foreach($collections as $category)
                                        <option value={{ $category->id }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="price"
                                       class="col-md-3 text-md-right col-form-label">Price</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="price" id="price"
                                           placeholder="Price" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="discount"
                                       class="col-md-3 text-md-right col-form-label">Discount</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="discount" id="discount"
                                           placeholder="Discount" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="description"
                                       class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="description" id="description"
                                           placeholder="Description" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="material"
                                       class="col-md-3 text-md-right col-form-label">Material</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="material" id="material"
                                           placeholder="Material" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="specification"
                                       class="col-md-3 text-md-right col-form-label">Specification</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="specification" id="specification"
                                           placeholder="Specification" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="clothing_care"
                                       class="col-md-3 text-md-right col-form-label">Clothing care</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="clothing_care" id="clothing_care"
                                           placeholder="Clothing care" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="weight"
                                       class="col-md-3 text-md-right col-form-label">Weight</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="weight" id="weight"
                                           placeholder="Weight" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="sku"
                                       class="col-md-3 text-md-right col-form-label">SKU</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="sku" id="sku"
                                           placeholder="SKU" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="tag"
                                       class="col-md-3 text-md-right col-form-label">Tag</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="tag" id="tag"
                                           placeholder="Tag" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="featured"
                                       class="col-md-3 text-md-right col-form-label">Featured</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="position-relative form-check pt-sm-2">
                                        <input name="featured" id="featured-yes" type="radio" value="1" class="form-check-input">
                                        <label for="featured-yes" class="form-check-label">Yes</label>
                                        <div></div>
                                        <input name="featured" id="featured-no" type="radio" value="0" class="form-check-input">
                                        <label for="featured-no" class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="/admin/product" class="border-0 btn btn-outline-danger mr-1">
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
