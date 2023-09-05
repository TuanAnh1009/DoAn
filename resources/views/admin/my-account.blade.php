@extends('admin/main')

@section('title', 'My Account')

@section('content')

    <!-- Main -->
    <div class="container-fluid">
        <div class="app-main__inner">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">My Information</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{ Auth::user()->id}}">

                                <div class="position-relative row form-group">
                                    <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="name" id="name" placeholder="Name" type="text"
                                               class="form-control" value="{{ Auth::user()->name}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="email"
                                           class="col-md-3 text-md-right col-form-label">Email</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input required name="email" id="email" placeholder="Email" type="email"
                                               class="form-control" value="{{ Auth::user()->email}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                        Company Name
                                    </label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="company_name" id="company_name"
                                               placeholder="Company Name" type="text" class="form-control"
                                               value="{{ Auth::user()->company_name}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="country"
                                           class="col-md-3 text-md-right col-form-label">Country</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="country" id="country" placeholder="Country"
                                               type="text" class="form-control" value="{{ Auth::user()->country}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                        Street Address
                                    </label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="street_address" id="street_address"
                                               placeholder="Street Address" type="text" class="form-control"
                                               value="{{ Auth::user()->street_address }}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                        Postcode Zip
                                    </label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="postcode_zip" id="postcode_zip"
                                               placeholder="Postcode Zip" type="text" class="form-control"
                                               value="{{ Auth::user()->postcode_zip }}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                        Town City
                                    </label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="town_city" id="town_city" placeholder="Town City"
                                               type="text" class="form-control" value="{{ Auth::user()->town_city}}">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="phone"
                                           class="col-md-3 text-md-right col-form-label">Number Phone</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="phone" id="phone" placeholder="Phone" type="tel"
                                               class="form-control" value="{{ Auth::user()->phone}}">
                                    </div>
                                </div>

                                <input type="hidden" name="level" value="1">

                                <div class="position-relative row form-group mb-1">
                                    <div class="col-md-9 offset-md-2">
                                        <button type="submit" style="float: right"
                                                class="btn-shadow btn-hover-shine btn btn-primary">
                                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                                            <i class="fa fa-download fa-w-20"></i>
                                                        </span>
                                            <span>Save</span>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
