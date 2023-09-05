@extends('front/layout/main')

@section('style')
    <link href="/css/front/collection.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="collection">
        <section class="collection-info">
            <div class="container-collection-info">
                <div class="information line">
                    <div class="description-collection">
                        <div class="box-description-collection">
                            <div class="name-collection">{{$collections->name}}</div>
                            <div class="title-description">{{$collections->description}}</div>
                            <div class="content-description">
                                {{$collections->content}}
                            </div>
                        </div>
                    </div>
                    <div class="avatar-collection">
                        <img src="/img/collections/{{$collections->avatar}}">
                    </div>
                </div>
            </div>
        </section>

        <section class="list-product-collection">
            <div class="container-list-product-collection">

                @foreach($collections->products as $collection)
                    <div class="item-product">
                        <a href="/products/{{$collection->id}}" class="link-product">
                            <div class="product line">
                                <div class="title-product">{{$collection->brand->name}}</div>
                            </div>
                            @if (count($collection->productImages) > 0)
                                <img class="img-product" src="/img/products/{{$collection->productImages[0]->path}}">
                            @else
                                <img class="img-product" src="/img/logo.jpg">
                            @endif

                            <div class="information-product">
                                <div class="name-product">{{$collection->name}}</div>
                                <div class="type-product">{{$collection->tag}}</div>

                                @if ($collection->discount == null)
                                    <div class="price-product">{{ number_format($collection->price) }} VND</div>
                                @else
                                    <div style="text-decoration-line: line-through; color: #7d7d80">{{ number_format($collection->price) }} VND</div>
                                    <div class="price-product">{{ number_format($collection->discount) }} VND</div>
                                @endif

                            </div>

                            @if($collection->qty <= 0)
                                <div class="sold-out">
                                    Sold Out
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
        </section>
    </main>
@endsection
