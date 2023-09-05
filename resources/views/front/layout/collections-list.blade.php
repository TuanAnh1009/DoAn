@extends('front/layout/main')

@section('style')
    <link href="/css/front/collections.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="collections">
        <section class="product-collections">
            <div class="container-list-collections">
                <div class="title-list-collections">
                    Collections Men's Clothing
                </div>
                <div class="list-collections">

                    @foreach($collections as $collection)
                        <div class="item-collection">
                            <a href="/collections/{{$collection->id}}" class="collection-link">
                                <img class="avatar-collection" src="img/collections/{{$collection->avatar}}">
                                <div class="name-item-collection">{{$collection->name}}</div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>
@endsection
