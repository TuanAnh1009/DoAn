@extends('front/layout/main')

@section('style')
    <link href="/css/front/products.css" rel="stylesheet" type="text/css">
{{--    CSS Phân trang cho Products--}}
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="products">
        <div class="container-products">
            <div class="filter">

                <form action="products">
                    <div class="sorting-product">
                        <select name="sort_by" onchange="this.form.submit();" class="sorting">
                            <option class="option" {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest">Sorting: Latest</option>
                            <option class="option" {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Sorting: Oldest</option>
                            <option class="option" {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }} value="price-ascending">Sorting: Price Ascending</option>
                            <option class="option" {{ request('sort_by') == 'price-descending' ? 'selected' : '' }} value="price-descending">Sorting: Price Descending</option>
                        </select>
                    </div>
                    <div class="item-filter category">
                        <div class="name-filter">Brand</div>
                        <div class="list-item brand">
                            @foreach($brands as $brand)
                                <div class="item">
                                    <label for="brand-{{ $brand->id }}">
                                        {{ $brand->name }}
                                        <input type="checkbox"
                                               {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
                                               id="brand-{{ $brand->id }}"
                                               name="brand[{{ $brand->id }}]"
                                                onchange="this.form.submit();">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
{{--                    <div class="item-filter category">--}}
{{--                        <div class="name-filter">Price</div>--}}
{{--                        <div class="range-price">--}}
{{--                            <div class="price-slider">--}}
{{--                                <span>--}}
{{--                                    <input type="number" value="0" min="0" max="120000"/>--}}
{{--                                    <span>-</span>--}}
{{--                                    <input type="number" value="120000" min="0" max="120000"/>--}}
{{--                                </span>--}}
{{--                                <input value="0" min="0" max="120000" step="500" type="range"/>--}}
{{--                                <input value="120000" min="0" max="120000" step="500" type="range"/>--}}
{{--                                <svg width="100%" height="24">--}}
{{--                                <line x1="4" y1="0" x2="300" y2="0" stroke="#212121" stroke-width="12" stroke-dasharray="1 28"></line>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="item-filter category">
                        <div class="name-filter">Color</div>
                        <div class="list-item color">
                            <div class="item">
                                <input hidden type="radio" id="cl-black" name="color" value="black" onchange="this.form.submit();"
                                    {{ request("color") == 'black' ? 'checked' : '' }}>
                                <label for="cl-black" class="cl-black"></label>
                                <span class="{{ request("color") == 'black' ? 'active' : '' }}">Black</span>
                            </div>
                            <div class="item">
                                <input hidden type="radio" id="cl-green" name="color" value="green" onchange="this.form.submit();"
                                    {{ request("color") == 'green' ? 'checked' : '' }}>
                                <label for="cl-green" class="cl-green"></label>
                                <span class="{{ request("color") == 'green' ? 'active' : '' }}">Green</span>
                            </div>
                            <div class="item">
                                <input hidden type="radio" id="cl-red" name="color" value="red" onchange="this.form.submit();"
                                    {{ request("color") == 'red' ? 'checked' : '' }}>
                                <label for="cl-red" class="cl-red"></label>
                                <span class="{{ request("color") == 'red' ? 'active' : '' }}">Red</span>
                            </div>
                            <div class="item">
                                <input hidden type="radio" id="cl-blue" name="color" value="blue" onchange="this.form.submit();"
                                    {{ request("color") == 'blue' ? 'checked' : '' }}>
                                <label for="cl-blue" class="cl-blue"></label>
                                <span class="{{ request("color") == 'blue' ? 'active' : '' }}">Blue</span>
                            </div>
                            <div class="item">
                                <input hidden type="radio" id="cl-white" name="color" value="white" onchange="this.form.submit();"
                                    {{ request("color") == 'white' ? 'checked' : '' }}>
                                <label for="cl-white" class="cl-white"></label>
                                <span class="{{ request("color") == 'white' ? 'active' : '' }}">White</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-filter category">
                        <div class="name-filter">Size</div>
                        <div class="list-item size">
                            <div class="item" style="width: auto">
                                <input hidden type="radio" id="size-s" name="size" value="s" onchange="this.form.submit();"
                                    {{ request("size") == 's' ? 'checked' : '' }}>
                                <label for="size-s" class="size-type {{ request("size") == 's' ? 'active' : '' }}">s</label>
                            </div>
                            <div class="item" style="width: auto">
                                <input hidden type="radio" id="size-m" name="size" value="m" onchange="this.form.submit();"
                                    {{ request("size") == 'm' ? 'checked' : '' }}>
                                <label for="size-m" class="size-type {{ request("size") == 'm' ? 'active' : '' }}">m</label>
                            </div>
                            <div class="item" style="width: auto">
                                <input hidden type="radio" id="size-l" name="size" value="l" onchange="this.form.submit();"
                                    {{ request("size") == 'l' ? 'checked' : '' }}>
                                <label for="size-l" class="size-type {{ request("size") == 'l' ? 'active' : '' }}">l</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="list-products">
                <div class="container-list-products">
                    @foreach($products as $product)
                    <a class="item-product" href="products/{{ $product->id }}">
                        <div class="img-product">

                            @if (count($product->productImages) > 0)
                                <img class="img-product" src="img/products/{{ $product->productImages[0]->path }}">
                            @else
                                <img class="img-product" src="/img/logo.jpg">
                            @endif

                        </div>
                        <div class="name-price-product">
                            <div class="name-product">{{ $product->name }}</div>
                            @if($product->discount == null)
                                <div class="price-product">{{ number_format($product->price) }} VND</div>
                            @else
                                <div class="price-product">
                                    <p style="font-size: 12px; font-weight: 400; color: #7d7d80; text-decoration-line: line-through">
                                        {{ number_format($product->price) }} VND
                                    </p>
                                    {{ number_format($product->discount) }} VND
                                </div>
                            @endif
                        </div>

                        @if($product->qty <= 0)
                            <div class="sold-out">
                                Sold Out
                            </div>
                        @endif
                    </a>
                    @endforeach
                </div>
{{--                Phân trang cho products--}}
                {{$products->links()}}
            </div>
        </div>
    </main>
    <script>
        (function() {

            var parent = document.querySelector(".price-slider");
            if(!parent) return;

            var
                rangeS = parent.querySelectorAll("input[type=range]"),
                numberS = parent.querySelectorAll("input[type=number]");

            rangeS.forEach(function(el) {
                el.oninput = function() {
                    var slide1 = parseFloat(rangeS[0].value),
                        slide2 = parseFloat(rangeS[1].value);

                    if (slide1 > slide2) {
                        [slide1, slide2] = [slide2, slide1];
                    }

                    numberS[0].value = slide1;
                    numberS[1].value = slide2;
                }
            });

            numberS.forEach(function(el) {
                el.oninput = function() {
                    var number1 = parseFloat(numberS[0].value),
                        number2 = parseFloat(numberS[1].value);

                    if (number1 > number2) {
                        var tmp = number1;
                        numberS[0].value = number2;
                        numberS[1].value = tmp;
                    }

                    rangeS[0].value = number1;
                    rangeS[1].value = number2;

                }
            });

        })();
    </script>
@endsection
