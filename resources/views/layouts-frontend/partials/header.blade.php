<header class="header-light scroll-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="index.html">
                                    <img alt="" class="logo" src="{{ asset('front-end/images/logo-light.png') }}" />
                                    <img alt="" class="logo-2" src="{{ asset('front-end/images/logo-light.png') }}" width="150px" />
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
                                <a href="index-5.php">Home<span></span></a>
                            </li>
                            <li>
                                <a href="index-5.php">About Us<span></span></a>
                            </li>
                            <li>
                                <a href="index-5.php">Product<span></span></a>
                            </li>
                            <li>
                                <a href="index-5.php">Services<span></span></a>
                            </li>
                            <li>
                                <a href="index-5.php">Contact Us<span></span></a>
                            </li>
                        </ul>
                        <div class="menu_side_area">
                            <a href="{{route('login')}}" class="btn-main btn-wallet"><i
                                    class="icon_wallet_alt"></i><span>Login</span></a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>