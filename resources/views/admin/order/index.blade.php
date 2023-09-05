@extends('admin/main')

@section('title', 'Manage | Oder')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
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
                        <th>Customer / Product</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="text-center">#{{ $order->id }}</td>
                            <td>
                                <strong>{{ $order->first_name . ' ' . $order->last_name}}</strong> <br>
                                {{ $order->orderDetails[0]->product->name }}

                                @if(count($order->orderDetails) > 0)
                                    (and {{ count($order->orderDetails) }} other products)
                                @endif
                            </td>
                            <td class="text-center col-3">
                                {{ $order->street_address . ', ' . $order->town_city}}
                            </td>
                            <td class="text-center col-2">{{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }} VND</td>
                            <td class="text-center col-1">
                                s
                            </td>
                            <td class="col-1">
                                <div  style="display: flex; justify-content: center">
                                    <a href="/admin/order/{{ $order->id }}"
                                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                        Details
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer d-block">
            {{ $orders->links() }}
        </div>

    </div>
@endsection
