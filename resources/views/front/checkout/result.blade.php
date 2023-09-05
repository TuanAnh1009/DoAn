@extends('front/layout/main')

@section('style')
    <link href="/css/front/checkout.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="checkout result">
        <div class="container-result">
            <div class="notification">Thank you! Your order has been success. You will pay on delivery.</div>
            <a href="/">Continue Shopping</a>
        </div>
    </main>
@endsection
