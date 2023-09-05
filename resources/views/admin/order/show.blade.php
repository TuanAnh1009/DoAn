@extends('admin/main')

@section('title', 'Order | Detail')

@section('content')
    <!-- Main -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
        </div>
        <div class="card-body card ">
            <div class="table-responsive">
                <div style="font-size: 30px; margin-bottom: 20px">List Product</div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>
                                <div class="content">
                                    <div class="content-left">
                                        <img src="/img/products/{{ $orderDetail->product->productImages[0]->path }}" alt="">
                                    </div>
                                    <div class="content-right">
                                        <strong>{{ $orderDetail->product->name }}</strong> <br>
                                        {{ $orderDetail->product->brand->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="text-center col-1">{{ $orderDetail->qty}}</td>
                            <td class="text-center col-2">{{ $orderDetail->amount }} VND</td>
                            <td class="text-center col-2">
                                {{ $orderDetail->total }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="">
                <div style="font-size: 30px; margin-bottom: 20px">List Product</div>

                <div>
                    <div class="text">Name :
                        <span>{{$order->first_name . ' ' . $order->last_name}}</span>
                    </div>

                    <div class="text">Email :
                        <span>{{ $order->email }}</span>
                    </div>

                    <div class="text">Phone number :
                        <span>{{$order->phone}}</span>
                    </div>

                    <div class="text">Country :
                        <span>{{$order->country}}</span>
                    </div>

                    <div class="text">Street Address:
                        <span>{{$order->street_address}}</span>
                    </div>

                    <div class="text">Town City:
                        <span>{{$order->town_city}}</span>
                    </div>

                    <div class="text">Postcode Zip :
                        <span>{{$order->postcode_zip}}</span>
                    </div>

                    <div class="text">Payment type :
                        <span>{{$order->payment_type}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
