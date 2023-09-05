@extends('front/layout/main')

@section('style')
    <link href="/css/front/product.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="main-product">
        <section class="navigation">
            <div class="container-navigation">
                <span>{{$product->productCategory->name}}</span> / <span>{{$product->name}}</span>
            </div>
        </section>

        <section class="product-information">
            <div class="container-product-information">
                <div class="information line">
                    <div class="product-media">
                        <div class="slider-image-product">
                            <div class="product-slider-for">

                                @if(count($product->productImages) > 0)
                                    @foreach($product->productImages as $productImage)
                                        <img class="image-product" src="/img/products/{{$productImage->path}}">
                                    @endforeach
                                @else
                                    <img class="image-product" src="/img/logo.jpg">
                                @endif

                            </div>
                            <div class="fancybox-slide">
                                <div class="background-fancybox-slide"></div>
                                <div class="product-slider-for" style="max-width:720px; margin: auto; height: 100%;">

                                    @if(count($product->productImages) > 0)
                                        @foreach($product->productImages as $productImage)
                                            <img src="/img/products/{{$productImage->path}}">
                                        @endforeach
                                    @else
                                        <img src="/img/logo.jpg">
                                    @endif

                                </div>
                                <div class="arrow-product prev product-prev">
                                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>PREV</title>
                                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Arrow" fill="#FFFFFF">
                                                <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="arrow-product next product-next">
                                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>NEXT</title>
                                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Arrow" fill="#FFFFFF">
                                                <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="nav-slider-product">
                                <div class="arrow-product prev product-prev">
                                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>PREV</title>
                                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Arrow" fill="#FFFFFF">
                                                <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="product-slider-nav">

                                    @if(count($product->productImages) > 0)
                                        @foreach($product->productImages as $productImage)
                                            <img src="/img/products/{{$productImage->path}}">
                                        @endforeach
                                    @else
                                        <img src="/img/logo.jpg">
                                    @endif

                                </div>
                                <div class="arrow-product next product-next">
                                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>NEXT</title>
                                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Arrow" fill="#FFFFFF">
                                                <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="dot-slider-hero-banner">
                            </div>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="detail-header">
                            <div class="name-collection">{{ $product->brand->name }}</div>
                            <div class="name-product">{{ $product->name }}</div>
                            <div class="tag-product">{{ $product->tag }}</div>
                            @if ($product->discount == null)
                                <div class="price-product">{{ number_format($product->price) }} VND</div>
                            @else
                                <div style="color: #7d7d80; text-decoration-line: line-through; font-size: 20px">
                                    {{ number_format($product->price) }} VND
                                </div>
                                <div class="price-product">{{ number_format($product->discount) }} VND</div>
                            @endif
                        </div>

                        <form method="get" action="/cart/add/{{ $product->id }}">
                            @csrf

                            <div class="product-options">
                                <div class="options-color">
                                    <div class="title-options">
                                        Color
                                    </div>

                                    <div class="list-color">

                                        @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                            <div class="color-item">
                                                <input type="radio" name="color" value="{{ $productColor }}" hidden="" id="product-color-{{ $productColor }}">
                                                <label for="product-color-{{ $productColor }}" class="cl-{{ $productColor }}"></label>
                                                <div class="options-size z-{{ $productColor }}">
                                                    <div class="title-options">
                                                        Size
                                                    </div>
                                                    <div class="list-size">
                                                        @foreach($product->productDetails as $productDetail)
                                                            @if( $productDetail->color == $productColor )
                                                                <div class="size-item">
                                                                    <input type="radio" name="size" value="{{ $productDetail->size }}" hidden=""
                                                                           id="product-size-{{ $productColor }}-{{ $productDetail->size }}">
                                                                    <label for="product-size-{{ $productColor }}-{{ $productDetail->size }}" class="size">{{ $productDetail->size }}</label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            @if ($product->qty > 0)
                                <div class="product-button">
                                    <a href="/cart/add/{{ $product->id }}" class="add-to-cart">Add to Cart</a>
                                </div>
                            @else
                                <div class="product-button">
                                    <div class="add-to-cart" style="background-color: #234766">Sold Out</div>
                                </div>
                            @endif
                        </form>

                        <div class="detail-footer">
                            <div class="toggle-info">
                                <div class="info" id="description-info">
                                    <div class="icon-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23.08" height="21.925" viewBox="0 0 23.08 21.925">
                                            <path fill="none" stroke="#5078a0" stroke-miterlimit="10" d="M10 0l2.361 7.257H20l-6.18 4.485L16.18 19 10 14.515 3.82 19l2.36-7.257L0 7.257h7.639z" transform="translate(1.54 1.616)"></path>
                                        </svg>
                                    </div>
                                    <div class="info-name">Description</div>
                                </div>
                                <div class="content-detail" id="description-content">{{$product->description}}</div>
                            </div>
                            <div class="toggle-info">
                                <div class="info" id="material-info">
                                    <div class="icon-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21" viewBox="0 0 18 21">
                                            <defs>
                                                <style>
                                                    .cls-1{fill:none;stroke:#5078a0;stroke-miterlimit:10}
                                                </style>
                                            </defs>
                                            <g id="Group_3" transform="translate(.5 .5)">
                                                <g id="Group_7">
                                                    <path id="Stroke_1" d="M17 1.25c0 .43-1.478.81-3.729 1.035-1.36.136-3 .215-4.771.215s-3.411-.079-4.771-.215C1.478 2.06 0 1.68 0 1.25 0 .56 3.806 0 8.5 0S17 .56 17 1.25z" class="cls-1"></path>
                                                    <path id="Stroke_3" d="M13.252 0C15.513.246 17 .662 17 1.133 17 1.888 13.194 2.5 8.5 2.5S0 1.888 0 1.133C0 .663 1.478.248 3.729 0" class="cls-1" transform="translate(0 17.5)"></path>
                                                    <path id="Stroke_5" d="M10.2 0v14.836c-1.454.1-3.21.164-5.1.164s-3.63-.06-5.08-.162H0V0" class="cls-1" transform="translate(3.4 2.5)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="info-name">
                                        <span>material</span>
                                    </div>
                                </div>
                                <div class="content-detail" id="material-content">{{$product->material}}</div>
                            </div>
                            <div class="toggle-info">
                                <div class="info" id="specification-info">
                                    <div class="icon-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Group_3" width="21" height="16" viewBox="0 0 21 16">
                                            <defs>
                                                <clipPath id="clip-path">
                                                    <path id="Clip_2" d="M0 0h21v16H0z" class="cls-1"></path>
                                                </clipPath>
                                                <style>
                                                    .cls-1{fill:none}
                                                </style>
                                            </defs>

                                            <g id="Group_3-2" clip-path="url(#clip-path)">
                                                <path id="Fill_1" fill="#5078a0" d="M15 9.807a2.352 2.352 0 0 0 .473.245c.021.04.061.045.1.053a2.432 2.432 0 0 0 .49.252.206.206 0 0 0 .129.074 1.636 1.636 0 0 0 .365.184.377.377 0 0 0 .175.1l.423.221.132.063a1.781 1.781 0 0 0 .421.218c.017.043.057.039.091.05a2.83 2.83 0 0 0 .5.257.211.211 0 0 0 .13.07 1.967 1.967 0 0 0 .422.215l.127.075.373.186a.311.311 0 0 0 .172.089l.421.261c0 .033.028.037.052.043l.325.291.123.129.292.414.054.1a2 2 0 0 1 .153 1.317 1.8 1.8 0 0 1-1 1.209l-.3.078-.633.01H15.423L14.8 16H1.937l-.63-.015c-.048-.045-.111-.03-.167-.041l-.423-.213-.088-.074-.288-.307a.234.234 0 0 0-.085-.127 2.136 2.136 0 0 1 .859-2.842c.3-.21.608-.4.913-.6l.546-.345c.554-.337 1.1-.678 1.64-1.044l.586-.362 1.7-1.082a4.532 4.532 0 0 0 .593-.367l.207-.127a.959.959 0 0 1 .58-.241l.041.016.087.028a.073.073 0 0 0 .072.046.635.635 0 0 1 .183.422.626.626 0 0 1-.344.425c-.1.056-.2.128-.3.194l-1.682 1.075a4.044 4.044 0 0 0-.546.345c-.571.344-1.136.7-1.688 1.072a3.643 3.643 0 0 0-.542.338c-.227.14-.457.276-.68.422a7.98 7.98 0 0 0-1.065.72 1.207 1.207 0 0 0-.485 1.1.394.394 0 0 0 .069.212.541.541 0 0 0 .279.35.246.246 0 0 0 .231.073H19.233a.72.72 0 0 0 .839-.851.184.184 0 0 0-.036-.172.805.805 0 0 0-.25-.481.109.109 0 0 0-.065-.081 1.221 1.221 0 0 0-.4-.342c-.008-.036-.036-.042-.066-.045a2.164 2.164 0 0 0-.484-.251.212.212 0 0 0-.128-.074 1.724 1.724 0 0 0-.368-.184.335.335 0 0 0-.174-.092l-.422-.222-.077-.036a2.338 2.338 0 0 0-.476-.246c-.019-.042-.06-.043-.1-.053a2.545 2.545 0 0 0-.492-.253.205.205 0 0 0-.129-.072 1.6 1.6 0 0 0-.363-.184.405.405 0 0 0-.176-.1l-.386-.2a.312.312 0 0 0-.17-.087 1.79 1.79 0 0 0-.421-.218c-.016-.043-.057-.038-.09-.049a2.94 2.94 0 0 0-.5-.258.209.209 0 0 0-.13-.069 1.569 1.569 0 0 0-.356-.184l-.194-.106-.372-.186a.313.313 0 0 0-.172-.089 1.863 1.863 0 0 0-.421-.219c-.015-.041-.053-.036-.085-.044a2.46 2.46 0 0 0-.467-.242.132.132 0 0 0-.102-.046 2.258 2.258 0 0 0-.485-.25.213.213 0 0 0-.128-.075 1.723 1.723 0 0 0-.369-.184.333.333 0 0 0-.173-.092l-.422-.222-.078-.036a2.39 2.39 0 0 0-.476-.246l-.126-.086a.711.711 0 0 1-.163-.383.491.491 0 0 0 0-.258 2.89 2.89 0 0 0 0-.6.488.488 0 0 0 0-.258 2.892 2.892 0 0 0 0-.6.487.487 0 0 0 0-.258 2.892 2.892 0 0 0 0-.6l.02-.248a.529.529 0 0 1 .348-.347l.244-.009a2.033 2.033 0 0 0 .853-.245 1.988 1.988 0 0 0 1.175-1.194 1.309 1.309 0 0 0 .04-.683.619.619 0 0 0-.067-.234 1 1 0 0 0-.2-.442l-.038-.056a1.037 1.037 0 0 0-.309-.339.346.346 0 0 0-.173-.129.94.94 0 0 0-.466-.213C10.96.972 10.9.984 10.838.983A1.114 1.114 0 0 0 10.2.977a.445.445 0 0 0-.252.056 1.685 1.685 0 0 0-1.14 1.15l-.023.041a.72.72 0 0 0-.053.261c-.006.056-.014.112-.019.168-.037.441-.18.57-.612.554l-.178-.116a.562.562 0 0 1-.129-.391v-.215a4.486 4.486 0 0 1 .229-.856l.26-.461A4.007 4.007 0 0 1 8.9.526l.508-.288a4.507 4.507 0 0 1 .839-.232L10.458 0l.589.051c.047.052.11.038.169.044l.462.177.13.071.332.218a.2.2 0 0 0 .113.091l.346.358a.2.2 0 0 0 .089.114l.245.41c.011.034.005.078.047.1l.141.425.064.286.021.527-.01.214a2.941 2.941 0 0 1-.572 1.191l-.359.365a4.267 4.267 0 0 1-1.35.739c-.5.119-.414-.021-.408.442v1.495c.007.063-.05.141.043.183a2.675 2.675 0 0 0 .5.255.208.208 0 0 0 .13.072 1.582 1.582 0 0 0 .36.183l.178.1.382.189a.313.313 0 0 0 .171.088 1.79 1.79 0 0 0 .421.218c.015.043.055.036.087.046l.5.264.071.031a2.211 2.211 0 0 0 .482.25.217.217 0 0 0 .128.075l.37.185a.324.324 0 0 0 .173.091 2.129 2.129 0 0 0 .421.22c.016.035.049.035.08.039"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="info-name">Specifications</div>
                                </div>
                                <div class="content-detail" id="specification-content">{{$product->specification}}</div>
                            </div>
                            <div class="toggle-info">
                                <div class="info" id="clothing-care-info">
                                    <div class="icon-item">
                                        <svg height="29" viewBox="0 0 27 29" width="27" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd" stroke="#5078a0" transform="translate(2.03374 1.415345)">
                                                <path d="m0 10.9931358.99821858 4.667711 3.9928743-.7559435v12.0950967h13.99227932v-12.0950967l3.975655.7559435.9982186-4.667711-7.7900977-3.39568676c-.5206633 2.64345626-1.8426374 3.96518436-3.9659224 3.96518436-2.1232851 0-3.44525922-1.3217281-3.96592245-3.96518436z"></path>
                                                <path d="m10.7266898 2.79675565-.8231528 1.96645411-1.91164788.83030153 1.91164788.83193807.8231528 1.96481758.8287181-1.96481758 1.9323598-.83193807-1.9323598-.83030153z"></path><path d="m3.44290898 0-1.02894096 2.45806765-2.38955985 1.03787691 2.38955985 1.03992258 1.02894096 2.45602198 1.03589773-2.45602198 2.41544972-1.03992258-2.41544972-1.03787691z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="info-name">Clothing Care</div>
                                </div>
                                <div class="content-detail" id="clothing-care-content">{{$product->clothing_care}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="collection-slider">
            <div class="container-link-collection">
                <div class="name-collection">
                    <a class="link-collection">Relate Product</a>
                </div>
            </div>
            <div class="container-collection-slider">
                <div class="list-product" id="collection-slider-1">

                    @foreach($relateProducts as $relateProduct )
                        <div class="item-product">
                            <a href="/products/{{$relateProduct->id}}" class="link-product">
                                <div class="product line">
                                    <div class="title-product">{{$relateProduct->brand->name}}</div>
                                </div>

                                @if (count($relateProduct->productImages) > 0)
                                    <img class="img-product" src="/img/products/{{$relateProduct->productImages[0]->path}}">
                                @else
                                    <img class="img-product" src="/img/logo.jpg">
                                @endif

                                <div class="information-product">
                                    <div class="name-product">{{$relateProduct->name}}</div>
                                    <div class="type-product">{{$relateProduct->tag}}</div>

                                    @if ($relateProduct->discount == null)
                                        <div class="price-product">{{ number_format($relateProduct->price) }} VND</div>
                                    @else
                                        <div style="text-decoration-line: line-through; color: #7d7d80">{{ number_format($relateProduct->price) }} VND</div>
                                        <div class="price-product">{{ number_format($relateProduct->discount) }} VND</div>
                                    @endif
                                </div>

                                @if($relateProduct->qty <= 0)
                                    <div class="sold-out">
                                        Sold Out
                                    </div>
                                @endif
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="arrow-collection-slider arrow-new-in">
                    <div class="arrow-collection prev slider-1-prev">
                        <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>PREV</title>
                            <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Arrow" fill="#FFFFFF">
                                    <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="arrow-collection next slider-1-next">
                        <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>NEXT</title>
                            <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Arrow" fill="#FFFFFF">
                                    <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        (function() {

            $('input[name=size]:first').attr('checked', true);
            $('input[name=color]:first').attr('checked', true);

            $('.cl-red').click(function () {
                $('.z-red input[name=size]:first').attr('checked', true);
                $('.z-red').css('display', 'flex');
                $('.z-green').css('display', 'none');
                $('.z-blue').css('display', 'none');
                $('.z-black').css('display', 'none');
                $('.z-white').css('display', 'none');
            });

            $('.cl-blue').click(function () {
                $('.z-blue input[name=size]:first').attr('checked', true);
                $('.z-blue').css('display', 'flex');
                $('.z-green').css('display', 'none');
                $('.z-red').css('display', 'none');
                $('.z-black').css('display', 'none');
                $('.z-white').css('display', 'none');
            });

            $('.cl-green').click(function () {
                $('.z-green input[name=size]:first').attr('checked', true);
                $('.z-green').css('display', 'flex');
                $('.z-blue').css('display', 'none');
                $('.z-red').css('display', 'none');
                $('.z-black').css('display', 'none');
                $('.z-white').css('display', 'none');
            });

            $('.cl-black').click(function () {
                $('.z-black input[name=size]:first').attr('checked', true);
                $('.z-black').css('display', 'flex');
                $('.z-blue').css('display', 'none');
                $('.z-red').css('display', 'none');
                $('.z-green').css('display', 'none');
                $('.z-white').css('display', 'none');
            })

            $('.cl-white').click(function () {
                $('.z-white input[name=size]:first').attr('checked', true);
                $('.z-white').css('display', 'flex');
                $('.z-blue').css('display', 'none');
                $('.z-red').css('display', 'none');
                $('.z-green').css('display', 'none');
                $('.z-black').css('display', 'none');
            })
        })();
    </script>
@endsection
