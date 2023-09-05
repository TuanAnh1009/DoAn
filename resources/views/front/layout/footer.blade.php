<footer class="section-footer">
    <section class="pre-footer">
        <div class="container-pre-footer">
            <div class="newsletter box">
                <div class="container-box line">
                    <div class="border">
                        <div class="content-box-newsletter">
                            <div>
                                <div class="title-box-newsletter">Newsletter</div>
                                <div class="description-newsletter">Sign up here for weekly updates and 10% off your first order.</div>
                            </div>

                            <form class="form-newsletter">
                                <input type="email" value="" name="EMAIL" class="input-email" placeholder="Enter email...">
                                <span>
                                    <button class="button-subscribe" type="submit" value="Sign Up" name="subscribe">
                                        <span class="newsletter__submit-text--large">Sign Up</span>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social box">
                <div class="container-box line">
                    <div class="border">
                        <div class="content-box-social">
                            <div class="area-social">
                                <div class="title-box-social">Find us online</div>
                                <ul class="list-social">
                                    <li class="item-social">
                                        <a target="_blank" href="https://www.facebook.com/profile.php?id=100008791548427">Facebook</a>
                                    </li>
                                    <li class="item-social">
                                        <a target="_blank" href="https://www.tiktok.com/@loananh10092000">Tiktok</a>
                                    </li>
                                    <li class="item-social">
                                        <a>Instagram</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="area-image">
                                <img src="https://cdn.shopify.com/s/files/1/0262/5311/files/Idioma_image_480x480.jpg?v=1632604817">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="container-footer">
            <div class="item-footer">
                <div class="container-box line">
                    <div class="title-item-footer">Collections</div>
                    <ul class="list-link-footer">

                        @foreach($list_collections as $category)
                        <li class="link-footer">
                            <a href="/collections/{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="item-footer">
                <div class="container-box line">
                    <div class="title-item-footer"></div>
                    <ul class="list-link-footer">
                    </ul>
                </div>
            </div>

            <div class="item-footer">
                <div class="container-box line">
                    <div class="title-item-footer">About Us</div>
                    <ul class="list-link-footer">
                        <li class="link-footer">
                            <a href="/pages/our-mission">Our Mission</a>
                        </li>
                        <li class="link-footer">
                            <a href="">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="item-footer">
                <div class="container-box line">
                    <div class="title-item-footer">Service</div>
                    <ul class="list-link-footer">
                        <li class="link-footer">
                            <a>Register</a>
                        </li>
                        <li class="link-footer">
                            <a href="">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-footer">
            <div class="item-footer" style="width: 100%; margin: 0 0 20px">
                <div class="container-box line">
                    <div class="title-item-footer">Information</div>
                    <div class="inf-store">
                        <a href="/"><img src="/img/logo.jpg"></a>
                        <ul class="inf">
                            <li>Address: 52 alley 91/8, Cau Dien street, Phuc Dien ward, Bac Tu Liem district, Ha Noi city.</li>
                            <li>Mail: tuananh20417@gmail.com</li>
                            <li>Phone number: 0963773905</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
</html>
