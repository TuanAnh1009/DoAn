@extends('front/layout/main')

@section('style')
    <link href="/css/front/pages.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <main class="page account">
        <div class="content-page">
            <div class="container-content-page">
                <div class="page-title">
                    My Information
                </div>
                <form method="post" action="" enctype="multipart/form-data" style="display: flex; flex-wrap: wrap; gap: 20px">
                    @csrf

                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div style="width: calc(50% - 10px)">
                        <label for="name">Name</label>
                        <input required name="name" id="name" placeholder="Name"
                                   type="text" value="{{ Auth::user()->name }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="email">Email</label>
                        <input required name="email" id="email" placeholder="Email"
                                   type="email" value="{{ Auth::user()->email }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="country">Country</label>
                        <input name="country" id="country" placeholder="Country"
                               type="text" value="{{ Auth::user()->country }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="street_address">Street Address</label>
                        <input name="street_address" id="street_address" placeholder="Street Address"
                               type="text" value="{{ Auth::user()->street_address }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="town_city">Town City</label>
                        <input name="town_city" id="town_city" placeholder="Town City"
                               type="text" value="{{ Auth::user()->town_city }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="postcode_zip">Postcode Zip</label>
                        <input name="postcode_zip" id="postcode_zip" placeholder="Postcode Zip"
                               type="text" value="{{ Auth::user()->postcode_zip }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="company_name">Company Name</label>
                        <input name="company_name" id="company_name" placeholder="Company Name"
                                   type="text" value="{{ Auth::user()->company_name }}">
                    </div>

                    <div style="width: calc(50% - 10px)">
                        <label for="phone">Number phone</label>
                        <input name="phone" id="phone" placeholder="Phone"
                                   type="tel" value="{{ Auth::user()->phone }}">
                    </div>

                    <input type="hidden" name="level" value="2">

                    <div style="display: flex;justify-content: center; width: 100%">
                        <button type="submit" class="save">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @if(session('alert'))
    <script>
        alert('{{ session('alert') }}');
    </script>
    @endif
@endsection
