@extends('front/layout/main')

@section('style')
    <link href="/css/front/home-page.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
<main class="home-page">
    <section class="hero-banner">
        <div class="slider-hero-banner">

            @foreach($collections as $category)
                <div class="container-hero-banner line">
                    <div class="content-hero">
                        <div class="title-hero-banner">
                            {{ $category->description }}
                        </div>
                        <div  class="button-hero-slider">
                            <a href="/collections/{{ $category->id }}" class="button">
                                {{ $category->name }}
                            </a>
                        </div>
                    </div>
                    <div class="image-hero">
                        <img src="/img/collections/{{ $category->avatar }}">
                    </div>
                </div>
            @endforeach

        </div>
        <div class="arrow-hero-banner">
            <div class="arrow-next">
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
    </section>

    <section class="home-description">
        <div class="container-description">
            Ethical men's clothing,
            <span>
                <a>selected with style</a>
            </span>
        </div>
    </section>

    <section class="collection-slider">
        <div class="container-link-collection">
            <div class="name-collection">
                <a class="link-collection">New in</a>
            </div>
        </div>
        <div class="container-collection-slider">
            <div class="list-product" id="collection-slider-1">

                @foreach($newProducts as $newProduct )
                    <div class="item-product">
                        <a href="/products/{{$newProduct->id}}" class="link-product">
                            <div class="product line">
                                <div class="title-product">{{$newProduct->brand->name}}</div>
                            </div>

                            @if (count($newProduct->productImages) > 0)
                                <img class="img-product" src="img/products/{{$newProduct->productImages[0]->path}}">
                            @else
                                <img class="img-product" src="img/logo.jpg">
                            @endif

                            <div class="information-product">
                                <div class="name-product">{{$newProduct->name}}</div>
                                <div class="type-product">{{$newProduct->tag}}</div>

                                @if ($newProduct->discount == null)
                                    <div class="price-product">{{ number_format($newProduct->price) }} VND</div>
                                @else
                                    <div style="text-decoration-line: line-through; color: #7d7d80">{{ number_format($newProduct->price) }} VND</div>
                                    <div class="price-product">{{ number_format($newProduct->discount) }} VND</div>
                                @endif
                            </div>

                            @if($newProduct->qty <= 0)
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

    <section class="home-about">
        <div class="container-about">
            <div class="item-about">
                <img class="home-about-img" src="https://cdn.shopify.com/s/files/1/0262/5311/files/BWS_Feel_good_240x240_150eefa1-b817-4711-869b-3801f4e8552f.webp?height=144&v=1648655092">
                <div class="title-item">Design</div>
                <div class="content-item">We hand-pick the most timeless styles from our favourite ethical designers, and curate them into collections for you. </div>
            </div>
            <div class="item-about">
                <img class="home-about-img" src="https://cdn.shopify.com/s/files/1/0262/5311/files/ethical_production_copy.png?height=144&v=1652276318">
                <div class="title-item">PROVENANCE</div>
                <div class="content-item">Discover the social and environmental impact of every style, with our pioneering product footprints.</div>
            </div>
            <div class="item-about">
                <img class="home-about-img" src="https://cdn.shopify.com/s/files/1/0262/5311/files/Untitled-2_6e1f0264-15ea-4bbf-ba8e-da6ff6f2f920.png?height=144&v=1652282739">
                <div class="title-item">QUALITY</div>
                <div class="content-item">Shop high quality clothing that satisfies your needs, supporting you to love it for longer.</div>
            </div>
        </div>
        <div class="learn-more">
        <a href="/pages/our-mission" class="link-learn-more button">
            Read more
        </a>
        </div>
    </section>

    <section class="collection-slider">
        <div class="container-link-collection">
            <div class="name-collection">
                <a class="link-collection">Featured</a>
            </div>
        </div>
        <div class="container-collection-slider">
            <div class="list-product" id="collection-slider-2">

                @foreach($featuredProducts as $featuredProduct )
                    <div class="item-product">
                        <a href="/products/{{ $featuredProduct->id }}" class="link-product">
                            <div class="product line">
                                <div class="title-product">{{ $featuredProduct->brand->name }}</div>
                            </div>

                            @if (count($featuredProduct->productImages) > 0)
                                <img class="img-product" src="img/products/{{ $featuredProduct->productImages[0]->path }}">
                            @else
                                <img class="img-product" src="img/logo.jpg">
                            @endif

                            <div class="information-product">
                                <div class="name-product">{{ $featuredProduct->name }}</div>
                                <div class="type-product">{{ $featuredProduct->tag }}</div>

                                @if ($featuredProduct->discount == null)
                                    <div class="price-product">{{ number_format($featuredProduct->price) }} VND</div>
                                @else
                                    <div style="text-decoration-line: line-through; color: #7d7d80">{{ number_format($featuredProduct->price) }} VND</div>
                                    <div class="price-product">{{ number_format($featuredProduct->discount) }} VND</div>
                                @endif

                            </div>

                            @if($featuredProduct->qty <= 0)
                                <div class="sold-out">
                                    Sold Out
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="arrow-collection-slider">
                <div class="arrow-collection prev slider-2-prev">
                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>PREV</title>
                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Arrow" fill="#FFFFFF">
                                <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="arrow-collection next slider-2-next">
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

    <section class="feature">
        <div class="content-feature">
            <div class="container-feature">
                <div class="title-feature line">
                    AS FEATURED IN
                </div>
            </div>
            <div class="slider-feature">
                <div class="box-feature">
                    TA Fashion is the home of e-commerce with a heart. Every stylish, sustainable item has a clear purpose - whether that’s upcycling, using renewable energy or supporting community artisans.”
                </div>
            </div>
        </div>
    </section>

    <section class="collection-slider">
        <div class="container-link-collection">
            <div class="name-collection">
                <a class="link-collection">IDIOMA</a>
            </div>
        </div>
        <div class="container-collection-slider">
            <div class="list-product" id="collection-slider-3">

                @foreach($brandProducts as $brandProduct)
                    <div class="item-product">
                        <a href="/products/{{$brandProduct->id}}" class="link-product">
                            <div class="product line">
                                <div class="title-product">{{$brandProduct->brand->name}}</div>
                            </div>

                            @if (count($brandProduct->productImages) > 0)
                                <img class="img-product" src="img/products/{{$brandProduct->productImages[0]->path}}">
                            @else
                                <img class="img-product" src="/img/logo.jpg">
                            @endif

                            <div class="information-product">
                                <div class="name-product">{{$brandProduct->name}}</div>
                                <div class="type-product">{{$brandProduct->tag}}</div>

                                @if ($brandProduct->discount == null)
                                    <div class="price-product">{{ number_format($brandProduct->price) }} VND</div>
                                @else
                                    <div style="text-decoration-line: line-through; color: #7d7d80">{{ number_format($brandProduct->price) }} VND</div>
                                    <div class="price-product">{{ number_format($brandProduct->discount) }} VND</div>
                                @endif
                            </div>

                            @if($brandProduct->qty <= 0)
                                <div class="sold-out">
                                    Sold Out
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="arrow-collection-slider">
                <div class="arrow-collection prev slider-3-prev">
                    <svg width="17px" height="18px" viewBox="0 0 17 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>PREV</title>
                        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Arrow" fill="#FFFFFF">
                                <polygon id="Fill-3" transform="translate(8.500000, 9.000000) rotate(-270.000000) translate(-8.500000, -9.000000) " points="7.58805575 1 0 17 2.34598347 17 8.54454108 3.44934827 14.6540165 17 17 17 9.44133218 1"></polygon>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="arrow-collection next slider-3-next">
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
@endsection

