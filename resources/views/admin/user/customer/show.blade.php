@extends('admin/main')

@section('title', 'Customer | Detail')

@section('content')
    <!-- Main -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customer Detail</h1>
        </div>
        <div class="card-body card ">
            <div class="col-8 m-auto">
                <div class="text">Name :
                    <span>{{$user->name}}</span>
                </div>
                <div class="text">Email :
                    <span>{{$user->email}}</span>
                </div>
                <div class="text">Company Name :
                    <span>{{$user->company_name}}</span>
                </div>
                <div class="text">Country:
                    <span>{{$user->country}}</span>
                </div>
                <div class="text">Street Address:
                    <span>{{$user->street_address}}</span>
                </div>
                <div class="text">Postcode Zip :
                    <span>{{$user->postcode_zip}}</span>
                </div>
                <div class="text">Town City :
                    <span>{{$user->town_city}}</span>
                </div>
                <div class="text">Number Phone :
                    <span>{{$user->phone}}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
