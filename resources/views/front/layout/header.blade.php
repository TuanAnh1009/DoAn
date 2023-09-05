<header class="section-header">
    <div class="header-wrap">
        <div class="container-header">
            <div class="list-icon mobile">
                <a class="icon" href="/cart" style="position: relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                    </svg>
                    @if(Cart::count() != 0)
                        <div class="cart-count">{{ Cart::count() }}</div>
                    @endif
                </a>
                <a class="icon" id="account-mb">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </a>
            </div>

            <a class="header-logo" href="/">
                <img class="img-logo" src="/img/logo.jpg">
            </a>
            <div class="header-menu">
                <div class="header-icon">
                    <a class="header-shipping">Free delivery in Hanoi</a>
                    <div class="list-icon">

                        <form action="/products">
                            <input name="search" value="{{request('search')}}" placeholder="What do you need?" type="text">
                            <button class="icon" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                            </button>

                        </form>

                        <a class="icon" href="/cart" style="position: relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            @if(Cart::count() != 0)
                            <div class="cart-count">{{ Cart::count() }}</div>
                            @endif
                        </a>
                        <a class="icon" id="account">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="nav-toggle">
                        <img id="show-nav-mobile" src="https://cdn.shopify.com/s/files/1/0262/5311/t/59/assets/menu.svg?v=6748580459253301831654872875">
                    </div>
                    <ul class="nav">
                        <li class="nav-close">
                            <svg id="hide-nav-mobile" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"> <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg>
                        </li>
                        <li class="li-nav">
                            <a href="/" class="site-nav-link">Home</a>
                        </li>
                        <li class="li-nav">
                            <a href="/products"  class="site-nav-link">Product</a>
                        </li>
                        <li class="li-nav">
                            <a href="/collections" class="site-nav-link">Collections</a>
                            <div class="nav-dropdown">
                                <ul class="ul-nav-dropdown">
                                    <li class="li-nav-dropdown">
                                        <div class="title-nav-sub">Men's Clothing</div>

                                        @foreach($list_collections as $collections)
                                        <ul class="ul-nav-sub">
                                            <li class="item-nav-sub"><a href="/collections/{{$collections->id}}">{{$collections->name}}</a></li>
                                        </ul>
                                        @endforeach

                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="li-nav">
                            <a href="/pages/our-mission"  class="site-nav-link">About</a>
                        </li>
                        <li class="li-nav">
                            <a class="site-nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search-mobile">
            <form action="/products">
                <input name="search" value="{{request('search')}}" placeholder="What do yeu need?" type="text">
                <button class="icon" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>

            </form>
        </div>
    </div>

    <div class="account">
        <div class="background-account-close"></div>
        <div class="container-account">
            <svg id="close-account" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>

            <div class="login-account">
                @if(Auth::check())
                    <div class="logged">
                        <div class="user-name">{{Auth::user()->name}}</div>
                        <a href="/my-account" class="my-account">My Account</a>
                        <a href="/account/logout" class="button-login">Logout</a>
                    </div>
                @else
                    <div class="login">
                        <div class="title-login">Login</div>

                        <div id="error"></div>

                        <form action="" class="form-login" method="POST">
                            <label for="email">Email Address<em>*</em></label>
                            <input type="text" id="email" placeholder="Enter Email Address" name="email" required="">
                            <label for="password">Password<em>*</em></label>
                            <input type="password" id="password" placeholder="Enter Password" required="" name="password">
                            <label for="save-pass" class="save-pass">
                                Save Password
                                <input type="checkbox" id="save-pass" name="remember">
                            </label>
                            <button class="button-login" type="button" id="btn-login">Login</button>
                            <a href="/account/forgot-password" class="forgot-account">Forgot your account ?</a>
                        </form>
                        <a href="/account/register" class="btn-creat-account">Create account</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
<script>
    $(document).ready(function(){
        $('#btn-login').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            var URL = '{{ url()->current() }}';
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url:URL,
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                },
                success:function(res) {
                    if(res.error) {
                        let _html_error = '<div class="error-alert" role="alert">';
                        for(let error of res.error) {
                            _html_error += '<li>' + error + '</li>';
                        }
                        _html_error += '</div>';
                        $('#error').html(_html_error);
                        $(".background-account-close").click(function() {
                            $('#error').empty();
                        });

                        $("#close-account").click(function() {
                            $('#error').empty();
                        });
                    } else {
                        window.location.reload();
                        alert("You are logged");
                    }
                    console.log(URL ,email,password);
                }
            });
        });
    });
</script>
