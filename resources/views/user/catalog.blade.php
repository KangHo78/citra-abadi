<x-app-layout-frontend>
    <div class="no-bottom" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section aria-label="section" style="padding-top: 40px">
            <div class="container">
                <div class="row wow fadeIn">



                    <aside class="col-md-3">
                        <div class="item_filter_group">
                            <h4>Pilih Kategori</h4>
                            <div class="hummingbird-treeview-converter">
                                @foreach ($category as $el)
                                    <li data-id="{{ $el->name }}">{{ $el->name }}</li>
                                @endforeach
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="searchCategory()">Cari Data</button>
                        </div>
                    </aside>
                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($item as $el)
                                <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="nft__item">

                                        <div class="author_list_pp">

                                        </div>
                                        <div class="nft__item_wrap">
                                            <div class="nft__item_extra">
                                                <div class="nft__item_buttons">
                                                    <button
                                                        onclick="location.href='{{ route('product-details', $el->id) }}'">Buy
                                                        Now</button>
                                                    {{-- <div class="nft__item_share">
                                                        <h4>Share</h4>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://gigaland.io"
                                                            target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                                                        <a href="https://twitter.com/intent/tweet?url=https://gigaland.io"
                                                            target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                                                        <a
                                                            href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site https://gigaland.io"><i
                                                                class="fa fa-envelope fa-lg"></i></a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <a href="{{ route('product-details', $el->id) }}">
                                                <img src="{{ $el->photos == null ? 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg?size=626&ext=jpg&ga=GA1.1.735520172.1710892800&semt=ais' : 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg?size=626&ext=jpg&ga=GA1.1.735520172.1710892800&semt=ais' }}"
                                                    class="lazy nft__item_preview" alt="">
                                            </a>
                                        </div>
                                        <div class="nft__item_info">
                                            <a href="{{ route('product-details', $el->id) }}">
                                                <h4 style="margin-right: 25px;">{{ $el->name }} </h4>
                                            </a>
                                            <div class="nft__item_click">
                                                <span></span>
                                            </div>
                                            <div class="nft__item_action">
                                                <a href="#"></a>
                                                <br>
                                            </div>
                                            <div class="nft__item_like" onclick="addToWishlish('{{ $el->id }}')">
                                                <i class="fa fa-heart"></i><span>{{ getWishlistByItem($el->id) }}</span>
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

            // Inisialisasi array untuk menyimpan nilai-nilai yang dicentang
            var checkedValues = [];
            var selectedCategories = [];

            // Saat halaman dimuat, periksa setiap elemen checkbox
            $(document).ready(function() {

                const urlParams = new URLSearchParams(window.location.search);
                const categories = urlParams.get('category');
                // Buat array dari parameter kategori
                selectedCategories = categories ? categories.split(',') : [];

                $("#treeview").hummingbird("checkNode", {
                    sel: "text",
                    vals: selectedCategories
                });

                $('.hummingbird-end-node').change(function() {
                    // Kosongkan array checkedValues
                    checkedValues = [];

                    // Periksa kembali setiap elemen checkbox
                    $('.hummingbird-end-node').each(function() {
                        // Periksa apakah elemen checkbox ini dicentang
                        if ($(this).is(':checked')) {
                            // Jika dicentang, tambahkan nilainya ke dalam array checkedValues
                            checkedValues.push($(this).data('id'));
                        }
                    });

                    // Tampilkan nilai-nilai yang dicentang dalam bentuk array
                    console.log(checkedValues);
                    // Redirect ke URL dengan query string yang telah ditambahkan
                });


            });

            function searchCategory(params) {
                // Saat elemen checkbox diganti statusnya
                window.location.href = "{{ route('catalog') }}?category=" + checkedValues + "&q=" +
                    "{{ request()->input('q') }}";
            }

            // function filterCategory(params) {

            //     console.log('asd');


            // $.ajax({
            //     url: "{{ route('add-to-wishlist') }}", // Ganti dengan URL endpoint Anda
            //     method: 'POST',
            //     dataType: 'json',
            //     data: {
            //         'item_id=' + params
            //     } + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
            //     success: function(response) {
            //         // Menangani respons dari server jika diperlukan
            //         if (response.type == 'success') {
            //             iziToast.success({
            //                 title: 'Berhasil',
            //                 message: response.message,
            //             });

            //         } else {
            //             iziToast.warning({
            //                 title: 'Pemberitahuan',
            //                 message: response.message,
            //             });
            //         }
            //     },
            //     error: function(xhr, status, error) {
            //         iziToast.error({
            //             title: 'Pemberitahuan',
            //             message: response.message,
            //         });
            //     }
            // });

            // }


            function addToWishlish(params) {

                $.ajax({
                    url: "{{ route('add-to-wishlist') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: 'item_id=' + params + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: response.message,
                            });
                            $('.drop_' + params).html(response.totalWishlist);

                        } else {
                            iziToast.warning({
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                            $('.drop_' + params).html(response.totalWishlist);
                            $(".nft__item_like i.active").removeClass("active")

                        }
                        // window.open('mailto:test@example.com?subject=Testing out mailto!&body=' + 'a' + '!',
                        // '_blank');

                    },
                    error: function(xhr, status, error) {
                        iziToast.error({
                            title: 'Pemberitahuan',
                            message: response.message,
                        });
                        $('.drop_' + params).html(response.totalWishlist);
                        $(".nft__item_like i.active").removeClass("active")
                    }
                });
            }
        </script>
    @endsection


</x-app-layout-frontend>
