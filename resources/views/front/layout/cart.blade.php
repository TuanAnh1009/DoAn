@extends('front/layout/main')

@section('style')
    <link href="/css/front/cart.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="cart">
        <section class="my-cart">
            <div class="container-cart">
                <div class="title-cart">My Cart</div>
                <div class="box-cart">
                    <div class="list-product">
                        <div class="title-item-cart line">Product</div>
                        @if(Cart::count() == 0)
                            There are no items in your cart. <a style="color: #54add3" href="/">Continue Shopping</a>
                        @endif

                        @foreach($carts as $cart)
                            <div class="item-product">
                                <div class="img-product">
                                    <img src="/img/products/{{ $cart->options->images[0]->path }}">
                                </div>
                                <div class="inf-product">
                                    <div class="name-product">{{ $cart->name }}</div>
                                    <div class="price-product">{{ number_format($cart->price) }} VND</div>

                                    <form action="/cart/update/{{ $cart->rowId }}" method="GET">
                                    <div class="qty-product" style="font-size: 16px">Quantity:
                                        <input style="width: 35px" min="0" type="number" name="qty" value="{{ $cart->qty }}">
                                    </div>
                                    <button type="submit" class="remove-product">Update</button>
                                    </form>


                                    <a href="/cart/remove/{{ $cart->rowId }}" class="remove-product">Remove</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="total">
                        <div class="title-item-cart line">Total</div>
                        @if(Cart::count() > 0)
                        <div class="money" style="margin-bottom: 10px">subtotal: {{ number_format($subtotal) }} VND</div>
                        <div class="money" style="margin-bottom: 10px">Shipping: {{ number_format($shipping) }} VND</div>
                        <div class="subtotal-product">Total: {{ number_format($total + $shipping) }} VND</div>
                        @endif
                        <a href="/checkout" @if(Cart::count() == 0) style="pointer-events: none; background-color: #234766" @endif class="btn-checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
