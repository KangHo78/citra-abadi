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
                                                    <button
                                                        onclick="location.href='{{ route('product-details', $el->item->id) }}'">Buy
                                                        Now</button>
                                                   
                                                </div>
                                            </div>
                                            @php
                                                $photo = '';
                                                if (!empty($el->item->photos) && $el->item->photos != '[]') {
                                                    # code...
                                                    $item_photo_temp_list = json_decode($el->item->photos, true)[0];

                                                    $pathToFile = 'public/uploads/items/' . $item_photo_temp_list; // Replace with your file path and disk

                                                    // $pathToFile = 'public/uploads/items'.$data->photos; // Replace with your file path and disk

                                                    if (Storage::disk('local')->exists($pathToFile)) {
                                                        // Get a temporary URL for the file (valid for a limited time)
                                                        // $photo = Storage::disk('local')->url($pathToFile);
                                                        $photo = Storage::disk('local')->url($pathToFile);
                                                    }
                                                }

                                            @endphp
                                            <a href="{{ route('product-details', $el->item->id) }}">
                                                <img src="{{ $photo != ''
                                                    ? $photo
                                                    : 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg?size=626&ext=jpg&ga=GA1.1.735520172.1710892800&semt=ais' }}"
                                                    class="lazy nft__item_preview" alt="">
                                            </a>
                                        </div>
                                        <div class="nft__item_info" style="background-size: cover;">
                                            <a href="{{ route('product-details', $el->item->id) }}">
                                                <h4 style="margin-right: 25px;">{{ $el->item->name }}</h4>
                                            </a>
                                            <div class="nft__item_click" style="background-size: cover;">
                                                <span></span>
                                            </div>
                                            <div class="nft__item_action" style="background-size: cover;">
                                                <a href="#"></a>
                                                <br>
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
