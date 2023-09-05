@extends('admin/main')

@section('title', 'Manage | Product')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <div class="page-title-actions">
                <a href="/admin/product/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                    Create
                </a>
            </div>
        </div>

        <div class="card-header">
            <form>
                <div class="input-group col-4">
                    <input type="search" name="search" id="search" class="form-control" value="{{ request('search') }}"
                    placeholder="Search"
                    >
                    <span class="input-group-append"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name / Brand</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Featured</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">#{{ $product->id }}</td>
                            <td>
                                <div class="content">
                                    <div class="content-left">
                                        <img src="/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">
                                    </div>
                                    <div class="content-right">
                                        <strong>{{ $product->name }}</strong> <br>
                                        {{ $product->brand->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-center col-2">{{ $product->price }} VND</td>
                            <td class="text-center col-1">{{ $product->qty }}</td>
                            <td class="text-center col-1">
                                @if( $product->featured == 1)
                                    <div class="badge badge-success mt-2">
                                        True
                                    </div>
                                @else
                                    <div class="badge badge-danger mt-2">
                                        False
                                    </div>
                                @endif
                            </td>
                            <td class="col-2">
                                <div  style="display: flex; justify-content: space-between">
                                    <a href="/admin/product/{{ $product->id }}"
                                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                        Details
                                    </a>

                                    <a href="/admin/product/{{ $product->id }}/edit" data-toggle="tooltip" title="Edit"
                                       data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                    </a>

                                    <form class="d-inline" action="/admin/product/{{ $product->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                type="submit" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom"
                                                onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer d-block">
            {{ $products->links() }}
        </div>

    </div>
@endsection
