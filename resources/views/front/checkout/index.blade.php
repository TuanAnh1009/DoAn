@extends('front/layout/main')

@section('style')
    <link href="/css/front/checkout.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="checkout">
        <form method="post" action="/checkout/post" enctype="multipart/form-data">
            @csrf

            @if(Cart::count() > 0)
            <div class="container-checkout">
            <div class="inf-user">
                <div class="title">Billing Details</div>

                <div class="form-order">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">

                    <div class="group m-bt">
                        <div class="name-user">
                            <label for="first_name"
                                   class="">First name</label>
                            <div class="">
                                <input name="first_name" id="first_name" placeholder="First name"
                                       type="text" class="form-control" value="{{ Auth::user()->name ?? '' }}">
                            </div>
                        </div>

                        <div class="name-user">
                            <label for="last_name"
                                   class="">Last name</label>
                            <div class="">
                                <input name="last_name" id="last_name" placeholder="Last name"
                                       type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div>

                    <div class="m-bt">
                        <label for="company_name" class="">Company Name</label>
                        <div class="">
                            <input name="company_name" id="company_name"
                                   placeholder="Company Name" type="text" class="form-control"
                                   value="{{ Auth::user()->company_name ?? '' }}">
                        </div>
                    </div>

                    <div class="m-bt">
                        <label for="country"
                               class="">Country</label>
                        <div class="">
                            <input name="country" id="country" placeholder="Country"
                                   type="text" class="form-control" value="{{ Auth::user()->country ?? '' }}">
                        </div>
                    </div>

                    <div class="m-bt">
                        <label for="street_address" class="">Street Address</label>
                        <div class="">
                            <input name="street_address" id="street_address"
                                   placeholder="Street Address" type="text" class="form-control"
                                   value="{{ Auth::user()->street_address ?? '' }}">
                        </div>
                    </div>

                    <div class="m-bt">
                        <label for="postcode_zip" class="">Postcode Zip</label>
                        <div class="">
                            <input name="postcode_zip" id="postcode_zip"
                                   placeholder="Postcode Zip" type="text" class="form-control"
                                   value="{{ Auth::user()->postcode_zip ?? '' }}">
                        </div>
                    </div>

                    <div class="m-bt">
                        <label for="town_city" class="">Town City</label>
                        <div class="">
                            <input name="town_city" id="town_city" placeholder="Town City"
                                   type="text" class="form-control" value="{{ Auth::user()->town_city ?? '' }}">
                        </div>
                    </div>

                    <div class="group">
                        <div class="name-user">
                            <label for="email" class="">Email</label>
                            <div class="">
                                <input name="email" id="email" placeholder="Email"
                                       type="text" class="form-control" value="{{ Auth::user()->email ?? '' }}">
                            </div>
                        </div>

                        <div class="name-user">
                            <label for="phone" class="">Number Phone</label>
                            <div class="">
                                <input name="phone" id="phone" placeholder="Phone" type="tel"
                                       class="form-control" value="{{ Auth::user()->phone ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inf-order">
                <div class="title">Your Order</div>
                <div class="list-order">

                    @foreach($carts as $cart)
                        <div class="item-order">
                            <div class="image">
                                <img src="/img/products/{{ $cart->options->images[0]->path }}">
                                <div class="qty">{{ $cart->qty }}</div>
                            </div>
                            <div class="name-product">{{ $cart->name }}</div>
                            <span class="amount-price">{{ number_format($cart->price * $cart->qty) }} VND</span>
                        </div>
                    @endforeach

                    <div class="subtotal line">
                        <div>Subtotal</div>
                        <span>{{ number_format($subtotal)}} VND</span>
                    </div>

                    <div class="subtotal line">
                        <div>Shipping</div>
                        <span>{{ number_format($shipping)}} VND</span>
                    </div>

                    <div class="total line">
                        <div>Total</div>
                        <span>{{ number_format($total + $shipping) }} VND</span>
                    </div>

                    <div class="place-order line">
                        <div class="payment-check">
                            <div class="pc-item">
                                <label for="pc-later" class="checkbox">
                                    Pay Later
                                    <input checked class="check" type="radio" name="payment_type" value="pay_later" id="pc-later">
                                </label>
                            </div>

                            <div class="pc-item">
                                <label for="pc-online" class="checkbox">
                                    Online Payment (Coming soon)
                                    <input disabled class="check" type="radio" name="payment_type" value="online_payment" id="pc-online">
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-order">Place Order</button>

                </div>
            </div>
        </div>
            @else
                <div class="cart-empty">Your cart is empty.</div>
            @endif

        </form>
    </main>
@endsection
