<x-app-layout-frontend>
    <div class="no-bottom" id="content">
        <div id="top"></div>
        <section id="subheader" class="text-light"
            data-bgimage="url(https://madebydesignesia.com/themes/gigaland/images/background/subheader-dark.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Cart</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section begin -->
        <section aria-label="section" style="padding-top: 40px">
            <div class="container">
                <div class=" wow fadeIn row justify-content-md-center">
                    <div class="col-md-10 mb-sm-20">


                        @foreach ($carts as $el)
                            <div class="spacer-20"></div>
                            <div class="switch-with-title s2">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3">
                                        <img src="https://images.tokopedia.net/img/cache/900/VqbcmM/2022/5/31/d433e28b-a196-4417-91f5-febc740cb744.jpg"
                                            class="lazy nft__item_preview" alt="" width="100px">
                                    </div>
                                    <div class="col-md-10 col-sm-9">
                                        <h5>{{$el->item->name}} <u>( {{$el->item_detail->sku}} )</u> </h5>
                                        <div class="de-switch">
                                            <div class="row">
                                                <input type="checkbox" id="notif-item-sold" class="checkbox">
                                                <span
                                                    style="cursor: pointer;
                                                        display: inline-block;
                                                        width: 38px;
                                                        height: 38px;
                                                        background: lightsteelblue;
                                                        text-align: center;
                                                        line-height: 32px;
                                                        border-radius: 30px;
                                                        padding-top: 3px;
                                                        margin-left: 5px;
                                                        color: white;">
                                                    <i class="fa fa-minus"></i>
                                                </span>
                                                <div class="col">
                                                    <input type="text" name="qty[]" id="qty[]"
                                                        class="form-control text-center" value="{{$el->qty}}">
                                                </div>
                                                <input type="checkbox" id="notif-item-sold" class="checkbox">
                                                <span
                                                    style="cursor: pointer;
                                                        display: inline-block;
                                                        width: 38px;
                                                        height: 38px;
                                                        background: lightsteelblue;
                                                        text-align: center;
                                                        line-height: 32px;
                                                        border-radius: 30px;
                                                        padding-top: 3px;
                                                        margin-left: 5px;
                                                        color: white;">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                                <input type="checkbox" id="notif-item-sold" class="checkbox">
                                                <span
                                                    style="cursor: pointer;
                                                        display: inline-block;
                                                        width: 38px;
                                                        height: 38px;
                                                        background: #dc3545;
                                                        text-align: center;
                                                        line-height: 32px;
                                                        border-radius: 30px;
                                                        padding-top: 3px;
                                                        margin-left: 5px;
                                                        color: white;">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                        <p><u>( {{$el->item_detail->material->name}} , {{$el->item_detail->spec->name}} , {{$el->item_detail->class->name}} , {{$el->item_detail->conn->name}} , {{$el->item_detail->size->name}} )</u></p>
                                        <div class="clearfix"></div>

                                        <input type="text" name="description" id="description" class="form-control"
                                            placeholder="Enter description">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="spacer-20"></div>

                        <div class="col-12">

                            <button class="btn-main float-end" onclick="checkout()"> <i class="fa fa-shopping-cart"></i>
                                &nbsp;
                                Checkout</button>
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

        <script>
            function checkout(params) {

                var namaProduk = "Kursi Panjang";
                var jumlah = "100";
                var warna = "Merah";
                var ukuran = "100cm";
                var nama = "Asep Hidayat";
                var alamat = "Jl Karah Agung xx";
                var nomorTelepon = "0523490234";

                var product = '';

                var pesan = "Halo, saya " + nama + " ingin memesan produk berikut:\n";


                product += "\nNama Produk: " + namaProduk + "\n" +
                    "Jumlah: " + jumlah + "\n" +
                    "Warna/Pilihan: " + warna + "\n" +
                    "Ukuran: " + ukuran + "\n";

                product += "\nNama Produk: " + namaProduk + "\n" +
                    "Jumlah: " + jumlah + "\n" +
                    "Warna/Pilihan: " + warna + "\n" +
                    "Ukuran: " + ukuran + "\n";

                var detail_user = "\nAlamat saya di  " + alamat + "& Nomor Telepon saya " + nomorTelepon;

                var url = "https://wa.me/6282142942965?text=" + encodeURIComponent(pesan + product + detail_user);
                // window.open(url, '_blank');
                window.open('mailto:test@example.com?subject=Testing out mailto!&body=' + product + '!', '_blank');
            }
        </script>
    @endsection


</x-app-layout-frontend>
