@extends('admin/main')

@section('title', 'Products | Detail')

@section('content')
    <!-- Main -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product Detail</h1>
        </div>
        <div class="card-body card ">
            <div class="col-8 m-auto">
                <div class="text">Name :
                    <span>{{$product->name}}</span>
                </div>

                <div class="image">
                    <div class="text">Image :</div>
                    <div class="list-image">
                        @foreach($product->productImages as $productImages)
                        <img src="/img/products/{{$productImages->path}}">
                        @endforeach
                    </div>
                </div>
                <div class="text">Product Images :
                    <a href="/admin/product/{{ $product->id }}/image">Manage Images</a>
                </div>
                <div class="text">Product Details :
                    <a href="/admin/product/{{ $product->id }}/detail">Manage Details</a>
                </div>
                <div class="text">Brand :
                    <span>{{$product->brand->name}}</span>
                </div>
                <div class="text">Collections :
                    <span>{{$product->productCategory->name}}</span>
                </div>
                <div class="text">Price:
                    <span>{{$product->price}} VNĐ</span>
                </div>
                <div class="text">Discount:
                    <span>{{$product->discount}} VNĐ</span>
                </div>
                <div class="text">Description :
                    <span>{{$product->description}}</span>
                </div>
                <div class="text">Material :
                    <span>{{$product->material}}</span>
                </div>
                <div class="text">Specification :
                    <span>{{$product->specification}}</span>
                </div>
                <div class="text">Clothing care :
                    <span>{{$product->clothing_care}}</span>
                </div>
                <div class="text">Qty :
                    <span>{{$product->qty}}</span>
                </div>
                <div class="text">Weight :
                    <span>{{$product->weight}}</span>
                </div>
                <div class="text">SKU :
                    <span>{{$product->sku}}</span>
                </div>
                <div class="text">Tag :
                    <span>{{$product->tag}}</span>
                </div>
                <div class="text">Featured :
                    @if($product->featured == 1)
                        <span>Yes</span>
                    @else
                        <span>No</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
