<x-app-layout-frontend>
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section aria-label="section" class="mt90 sm-mt-0 pb-0">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-lg-3 text-center">

                        <div class="" style="border:1px solid black">
                            <img src="https://www.sinhong.com/UploadedImg/category/1062016_50826_PM_1_Anchor_660_md.jpg"
                                class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-1 text-center">
                        <div>
                            <div class="mb10" style="border:1px solid black">
                                <img src="https://www.sinhong.com/UploadedImg/category/1062016_50826_PM_1_Anchor_660_md.jpg"
                                    class="img-fluid img-rounded mb-sm-30" alt="" width="100px">
                            </div>
                            <div class="mb10" style="border:1px solid black">
                                <img src="https://www.sinhong.com/UploadedImg/category/31052016_124224_PM_9_SnM_910_md.jpg"
                                    class="img-fluid img-rounded mb-sm-30" alt="" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="item_info">
                            <!-- Auctions ends in <div class="de_countdown" data-year="2022" data-month="4" data-day="16" data-hour="8"></div> -->
                            <h2>{{ $item->name }}</h2>
                            <div class="item_info_counts">
                                <div class="item_info_type"><i class="fa fa-image"></i>{{ $item->category->name }}</div>
                                <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                <div class="item_info_like"><i class="fa fa-heart"></i>18</div>
                            </div>
                            <p>
                                {!! $item->description !!}
                            </p>

                            {{-- 

                            <div class="de_tab_content">
                                <div class="tab-1">

                                    <h6>Data Detail</h6>
                                    <img width="100%"
                                        src="https://www.sinhong.com/UploadedImg/images/1_Anchor_660_FIG_V2.jpg"
                                        alt="">
                                    <div class="spacer-30"></div>
                                </div>


                            </div> --}}

                            <div class="spacer-10"></div>

                            <!-- <h6>Price</h6>
                            <div class="nft-item-price"><img src="images/misc/ethereum.svg"
                                    alt=""><span>0.059</span>($253.67)</div> -->

                            <!-- Button trigger modal -->
                            <a href="#" class="btn-main btn-lg" data-bs-toggle="modal" data-bs-target="#buy_now">
                                <i class="fa fa-heart"></i> Add Wishlist
                            </a>
                            &nbsp;
                            <a href="#" class="btn-main btn-lg btn-light" data-bs-toggle="modal"
                                data-bs-target="#place_a_bid">
                                <i class="fa fa-share-alt"></i> Share Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr style="margin-bottom: 0px;">

        <section aria-label="section" class="sm-mt-0 pt50" style="background-color:aliceblue">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item_info">
                            <!-- Auctions ends in <div class="de_countdown" data-year="2022" data-month="4" data-day="16" data-hour="8"></div> -->
                            <div class="container" style="background-size: cover;">
                                <div class="row" style="background-size: cover;">
                                    <div class="col-md-12" style="background-size: cover;">
                                        <div class="items_filter text-start" style="background-size: cover;">

                                            <div id="filter_by_duration" class="dropdown"
                                                style="background-size: cover;">
                                                <a href="#" class="btn-selector">Filter By Material </a>
                                                <ul>
                                                    @foreach ($material as $el)
                                                        <li><span>{{ $el->name }}</span></li>
                                                    @endforeach
                                                    {{-- <li><span>Last 24 hours</span></li>
                                                    <li class="active"><span>Last 7 days</span></li>
                                                    <li><span>Last 30 days</span></li>
                                                    <li><span>All time</span></li> --}}
                                                </ul>
                                            </div>

                                            <div id="filter_by_finishing" class="dropdown"
                                                style="background-size: cover;">
                                                <a href="#" class="btn-selector"> Filter By Finishing </a>
                                                <ul>
                                                    @foreach ($material as $el)
                                                        <li><span>{{ $el->name }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div id="filter_by_category" class="dropdown"
                                                style="background-size: cover;">
                                                <a href="#" class="btn-selector"> Filter By Diameter</a>
                                                <ul>
                                                    @foreach ($material as $el)
                                                        <li><span>{{ $el->name }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div id="filter_by_category" class="dropdown"
                                                style="background-size: cover;">
                                                <input type="text" name="search" id="description"
                                                    class="form-control" placeholder="Cari Item..">
                                            </div>

                                            <div id="filter_by_category" class="dropdown float-end"
                                                style="background-size: cover;">
                                                <button class="btn btn-main"><i class="fa fa-shopping-basket"></i>
                                                    &nbsp; Add To Cart </button>
                                            </div>
                                        </div>

                                        <table class="table table-md">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Item Code</th>
                                                    <th scope="col">Material</th>
                                                    <th scope="col">Finishing</th>
                                                    <th scope="col">diameter</th>
                                                    <th scope="col">Length</th>
                                                    <th scope="col">Qty/Pkt</th>
                                                    <th scope="col" style="width: 15%;" class="text-end">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th style="padding-left: 0px !important;vertical-align: middle;">
                                                        <u>670021-060-050</u>
                                                    </th>
                                                    <td style="vertical-align: middle;">STEEL</td>
                                                    <td style="vertical-align: middle;" class="d-plus">YELLOW ZINC
                                                    </td>
                                                    <td style="vertical-align: middle;" class="d-plus">M 8</td>
                                                    <td style="vertical-align: middle;">50</td>
                                                    <td style="vertical-align: middle;">100</td>
                                                    <td>
                                                        <div class="field-set" style="background-size: cover;">
                                                            <input type="text" name="email" id="email"
                                                                class="form-control text-end" placeholder="0">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="padding-left: 0px !important;vertical-align: middle;">
                                                        <u>670021-060-050</u>
                                                    </th>
                                                    <td style="vertical-align: middle;">STEEL</td>
                                                    <td style="vertical-align: middle;" class="d-plus">YELLOW ZINC
                                                    </td>
                                                    <td style="vertical-align: middle;" class="d-plus">M 8</td>
                                                    <td style="vertical-align: middle;">50</td>
                                                    <td style="vertical-align: middle;">100</td>
                                                    <td>
                                                        <div class="field-set" style="background-size: cover;">
                                                            <input type="text" name="email" id="email"
                                                                class="form-control text-end" placeholder="0">
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <div class="spacer-double" style="background-size: cover;"></div>

                                        <ul class="pagination justify-content-center">
                                            <li><a href="#">Previous</a></li>
                                            <li class="active"><a href="#">1 - 20</a></li>
                                            <li><a href="#">21 - 40</a></li>
                                            <li><a href="#">41 - 60</a></li>
                                            <li><a href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>
    <link href="https://cdn.jsdelivr.net/gh/hummingbird-dev/hummingbird-treeview@v3.0.5/hummingbird-treeview.min.css"
        rel="stylesheet">
    <!-- <script src="https://raw.githubusercontent.com/hummingbird-dev/hummingbird-treeview/master/hummingbird-treeview.js">
    </script> -->
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


</x-app-layout-frontend>
