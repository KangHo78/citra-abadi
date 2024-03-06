<header class="header-light scroll-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="{{ url('/') }}">
                                    <img alt="" class="logo" src="front-end/images/logo-light.png" />
                                    <img alt="" class="logo-2" src="front-end/images/logo-light.png"
                                        width="150px" />
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                        <div class="de-flex-col">
                            <input id="quick_search" class="xs-hide" name="quick_search"
                                placeholder="search item here..." type="text" />
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainmenu begin -->
                        <ul id="mainmenu">
                            <li>
                                <a href="{{ url('/') }}">Home<span></span></a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}">About Us<span></span></a>
                            </li>
                            <li>
                                <a href="{{ route('catalog') }}">Product<span></span></a>
                            </li>
                            <li>
                                <a href="{{ route('service') }}">Services<span></span></a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us') }}">Contact Us<span></span></a>
                            </li>
                        </ul>
                        <div class="menu_side_area" style="background-size: cover;">
                            <div class="de-login-menu" style="background-size: cover;">
                                <a href="02_dark-create-options.html" class="btn-main btn-wallet"><i
                                        class="icon_wallet_alt"></i><span>Login</span></a>

                                <a href="{{ route('wishlist') }}"><span
                                        style="cursor: pointer;
                                display: inline-block;
                                width: 38px;
                                height: 38px;
                                background: #eeeeee;
                                text-align: center;
                                line-height: 32px;
                                border-radius: 30px;
                                padding-top: 3px;
                                margin-left: 5px;">
                                        <i class="fa fa-heart"></i>
                                    </span>
                                </a>
                                <span id="de-click-menu-notification" class="de-menu-notification">
                                        <span class="d-count">8</span>
                                        <i class="fa fa-shopping-bag"></i>
                                    </span>
                                <span id="de-click-menu-profile" class="de-menu-profile">
                                    <img src="https://madebydesignesia.com/themes/gigaland/images/author_single/author_thumbnail.jpg"
                                        class="img-fluid" alt="">
                                </span>

                                <div id="de-submenu-notification" class="de-submenu"
                                    style="background-size: cover; display: none;">
                                    <div class="de-flex" style="background-size: cover;">
                                        <div style="background-size: cover;">
                                            <h4>Keranjang</h4>
                                        </div>
                                        <a href="{{ route('checkout') }}">Show all</a>
                                    </div>

                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img class="lazy"
                                                    src="https://www.sinhong.com/UploadedImg/category/13062016_50832_PM_5_Nut_340A_bg.jpg"
                                                    alt="">
                                                <div class="d-desc" style="background-size: cover;">
                                                    <span class="d-name"><b>Dog[Eye] Bolt c/w Wing Nut</b> <br>
                                                        10pcs</span>
                                                    {{-- <span class="d-time">10pcs</span> --}}
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img class="lazy"
                                                    src="https://www.sinhong.com/UploadedImg/category/13062016_50832_PM_5_Nut_340A_bg.jpg"
                                                    alt="">
                                                <div class="d-desc" style="background-size: cover;">
                                                    <span class="d-name"><b>Dog[Eye] Bolt c/w Wing Nut</b> <br>
                                                        10pcs</span>
                                                    {{-- <span class="d-time">10pcs</span> --}}
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('checkout') }}">
                                                <button class="btn btn-main w-100"> Keranjang </button>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <div id="de-submenu-profile" class="de-submenu"
                                    style="display: none; background-size: cover;">
                                    <div class="d-name" style="background-size: cover;">
                                        <h4>Monica Lucas</h4>
                                        <a href="02_dark-profile.html">Set display name</a>
                                    </div>
                                    <div class="spacer-10" style="background-size: cover;"></div>
                                    <div class="d-balance" style="background-size: cover;">
                                        <h4>Balance</h4>
                                        12.858 ETH
                                    </div>
                                    <div class="spacer-10" style="background-size: cover;"></div>
                                    <div class="d-wallet" style="background-size: cover;">
                                        <h4>My Wallet</h4>
                                        <span id="wallet"
                                            class="d-wallet-address">DdzFFzCqrhshMSxb9oW3mRo4MJrQkusV3fGFSTwaiu4wPBqMryA9DYVJCkW9n7twCffG5f5wX2sSkoDXGiZB1HPa7K7f865Kk4LqnrME</span>
                                        <button id="btn_copy" title="Copy Text">Copy</button>
                                    </div>

                                    <div class="d-line" style="background-size: cover;"></div>

                                    <ul class="de-submenu-profile">
                                        <li><a href="02_dark-author.html"><i class="fa fa-user"></i> My profile</a>
                                        </li>
                                        <li><a href="02_dark-profile.html"><i class="fa fa-pencil"></i> Edit
                                                profile</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-sign-out"></i> Sign out</a>
                                        </li>
                                    </ul>
                                </div>
                                <span id="menu-btn"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
