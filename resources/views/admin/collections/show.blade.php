@extends('admin/main')

@section('title', 'Collections | Detail')

@section('style')
    <link href="/css/admin/css/custom.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- Main -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Collections Detail</h1>
        </div>
        <div class="card-body card ">
            <div class="col-8 m-auto">
                <div class="text">Name :
                    <span>{{$collections->name}}</span>
                </div>

                <div class="image">
                    <div class="text">Image :</div>
                     <img class="cl-img" src="/img/collections/{{$collections->avatar}}">

                </div>
                <div class="text">Description :
                    <span>{{$collections->description}}</span>
                </div>
                <div class="text">Content :
                    <span>{{$collections->content}}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
