<x-app-layout-frontend>
    <div class="no-bottom" id="content">
        <div id="top"></div>
        <section id="subheader" class="text-light"
            data-bgimage="url(https://madebydesignesia.com/themes/gigaland/images/background/subheader-dark.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Wishlist</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section begin -->
        <section aria-label="section" style="padding-top: 40px">
            <div class="container">
                <div class="row wow fadeIn">


                    <div class="col-md-12">
                        <div class="row">

                            @foreach ($data as $el)
                            <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12"
                                style="display: block; background-size: cover;">
                                <div class="nft__item style-2" style="background-size: cover;">
        
                                    <div class="nft__item_wrap" style="background-size: cover; height: 221px;">
                                        <div class="nft__item_extra"
                                            style="background-size: cover; visibility: hidden; opacity: 0;">
                                            <div class="nft__item_buttons" style="background-size: cover;">
                                                <button onclick="location.href='{{ route('product-details',$el->item->id) }}'">Buy
                                                    Now</button>
                                                <div class="nft__item_share" style="background-size: cover;">
                                                    <h4>Share</h4>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://gigaland.io"
                                                        target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                                                    <a href="https://twitter.com/intent/tweet?url=https://gigaland.io"
                                                        target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                                                    <a
                                                        href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site https://gigaland.io"><i
                                                            class="fa fa-envelope fa-lg"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('product-details',$el->item->id) }}">
                                            <img src="https://images.tokopedia.net/img/cache/900/VqbcmM/2022/5/31/d433e28b-a196-4417-91f5-febc740cb744.jpg"
                                                class="lazy nft__item_preview" alt="">
                                        </a>
                                    </div>
                                    <div class="nft__item_info" style="background-size: cover;">
                                        <a href="{{ route('product-details',$el->item->id) }}">
                                            <h4 style="margin-right: 25px;">{{$el->item->name}}</h4>
                                        </a>
                                        <div class="nft__item_click" style="background-size: cover;">
                                            <span></span>
                                        </div>
                                        <div class="nft__item_action" style="background-size: cover;">
                                            <a href="#"></a>
                                            <br>
                                        </div>
                                        <div class="nft__item_like" style="background-size: cover;">
                                            <i class="fa fa-heart"></i><span>50</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            <div class="col-md-12 text-center">
                                <a href="#" id="loadmore" class="btn-main wow fadeInUp lead">Load more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    @section('scripts')
        <link href="https://cdn.jsdelivr.net/gh/hummingbird-dev/hummingbird-treeview@v3.0.5/hummingbird-treeview.min.css"
            rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/hummingbird-dev/hummingbird-treeview@v3.0.5/hummingbird-treeview.min.js">
        </script>
        <style>
            input[type="checkbox"] {
                appearance: auto;
            }

            .hummingbird-base {
                padding-left: 0px;
            }

            .hummingbird-base label {
                font-family: var(--body-font);
                font-size: 16px;
                font-weight: 400;
                color: #727272;
                line-height: 30px;
                padding: 0;
                line-height: 26px;
                word-spacing: 0px;
            }

            .hummingbird-treeview,
            .hummingbird-treeview * {
                line-height: 40px;
            }
        </style>
        <script>
            $(document).ready(function() {
                //options
                $.fn.hummingbird.defaults.collapsedSymbol = "fa-angle-right";
                $.fn.hummingbird.defaults.expandedSymbol = "fa-angle-down";
                $.fn.hummingbird.defaults.hoverItems = true;

                //init	
                $("#treeview").hummingbird();

                //expandAll
                $("#expandAll").on("click", function() {
                    $("#treeview").hummingbird("expandAll");
                });
                //collapseAll
                $("#collapseAll").on("click", function() {
                    $("#treeview").hummingbird("collapseAll");
                });

                //pre-check
                var pre_check = [1, 2];
                $.each(pre_check, function(i, e) {
                    $("#treeview").hummingbird("checkNode", {
                        attr: "data-id",
                        name: e,
                        expandParents: false
                    });
                });

            });
        </script>
    @endsection


</x-app-layout-frontend>
