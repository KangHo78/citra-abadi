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
                                <div class="item_info_type"><i class="fa fa-list"></i>SKU : {{ $item->sku }}</div>
                                <div class="item_info_type"><i class="fa fa-archive"></i>{{ $item->category->name }}
                                </div>
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
                            <button class="btn-main btn-lg"> <i class="fa fa-heart"></i> Add Wishlist </button>
                            <button class="btn-main bg-info btn-lg btn-light"> <i class="fa fa-share-alt"></i> Share
                                Product </button>
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
                                        <div class="row">

                                            {{-- <div class="col-sm-12"> --}}
                                            {{-- <select id="select-ajax" class="form-control"></select> --}}
                                            {{-- <select name="material" id=""
                                                    class="js-data-example-ajax form-control select2">
                                                    <option value="" data-filter="">- Filter Material -</option>
                                                </select>
                                                <div class="spacer-single" style="background-size: cover;"></div> --}}
                                            {{-- <div class="spacer-double" style="background-size: cover;"></div> --}}


                                            {{-- </div> --}}

                                            <div class="col-sm-2">
                                                <select name="material" id=""
                                                    class="material_filter form-control select2">
                                                    <option value="" data-filter="">- Filter Material -</option>
                                                    @foreach ($material as $el)
                                                        <option value="{{ $el->id }}"
                                                            data-filter="{{ $el->name }}">{{ $el->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="spacer-single" style="background-size: cover;"></div>
                                            </div>

                                            <div class="col-sm-2">
                                                <select name="material" id=""
                                                    class="spec_filter form-control select2">
                                                    <option value="" data-filter="">- Filter Spec -</option>
                                                    @foreach ($spec as $el)
                                                        <option value="{{ $el->id }}"
                                                            data-filter="{{ $el->name }}">{{ $el->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="spacer-single" style="background-size: cover;"></div>
                                            </div>

                                            <div class="col-sm-2">
                                                <select name="class" id=""
                                                    class="class_filter form-control select2">
                                                    <option value="" data-filter="">- Filter Class -</option>
                                                    @foreach ($class as $el)
                                                        <option value="{{ $el->id }}"
                                                            data-filter="{{ $el->name }}">{{ $el->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="spacer-single" style="background-size: cover;"></div>
                                            </div>

                                            <div class="col-sm-2">
                                                <select name="conn" id=""
                                                    class="conn_filter form-control select2">
                                                    <option value="" data-filter="">- Filter Conn -</option>
                                                    @foreach ($conn as $el)
                                                        <option value="{{ $el->id }}"
                                                            data-filter="{{ $el->name }}">{{ $el->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="spacer-single" style="background-size: cover;"></div>
                                            </div>

                                            <div class="col-sm-2">
                                                <select name="size" id=""
                                                    class="size_filter form-control select2">
                                                    <option value="" data-filter="">- Filter Size -</option>
                                                    @foreach ($size as $el)
                                                        <option value="{{ $el->id }}"
                                                            data-filter="{{ $el->name }}">{{ $el->name }}"
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="spacer-single" style="background-size: cover;"></div>
                                            </div>

                                            <div class="col-sm-2">
                                                <input type="text" name="filter_all" id="filter_all"
                                                    class="form-control" placeholder="Search...">
                                            </div>


                                        </div>
                                        {{-- <div class="spacer-single" style="background-size: cover;"></div> --}}
                                        <form action="#" class="form-data">
                                            <div class="responsive" style="overflow:auto">
                                                <table class="table table-sm table-responsive">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>NO</th> --}}
                                                            <th style="vertical-align: middle;text-align: center;">
                                                                Code/SKU
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center;">
                                                                Material
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center;">Spec
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center;">
                                                                Class
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center;">Conn
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center;">Size
                                                            </th>
                                                            <th style="vertical-align: middle;text-align: center;"
                                                                class="text-end">Qty</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        @foreach ($item->item_detail as $i => $el)
                                                            <tr>
                                                                {{-- <th>
                                                                    {{ $i + 1 }}
                                                                </th> --}}

                                                                <th
                                                                    style="padding-left: 0px !important;vertical-align: middle;text-align: center;">
                                                                    <input type="hidden" name="item_id[]"
                                                                        value="{{ $el->item_id }}">
                                                                    <input type="hidden" name="item_detail_id[]"
                                                                        value="{{ $el->id }}">

                                                                    {{ $el->sku }}
                                                                </th>
                                                                <td style="vertical-align: middle;text-align: center;">
                                                                    <div style="min-width:100px;max-width:200px">
                                                                        {{ $el->material->name }}
                                                                    </div>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center;">
                                                                    <div style="min-width:100px;max-width:200px">
                                                                        {{ $el->spec->name }}
                                                                    </div>

                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center;">
                                                                    <div style="min-width:100px;max-width:200px">
                                                                        {{ $el->class->name }}
                                                                    </div>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center;">
                                                                    <div style="min-width:100px;max-width:200px">
                                                                        {{ $el->conn->name }}
                                                                    </div>
                                                                </td>
                                                                <td style="vertical-align: middle;text-align: center;">
                                                                    <div style="min-width:100px;max-width:200px">
                                                                        {{ $el->size->name }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="qty[]"
                                                                        class="form-control text-end" value=""
                                                                        {{-- style="min-width:150px;max-width:250px"  --}}>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="spacer-single" style="background-size: cover;"></div>

                                            <div id="filter_by_category" class="dropdown float-end"
                                                style="background-size: cover;">
                                                <button class="btn btn-main" type="button" onclick="addToCart()"><i
                                                        class="fa fa-shopping-basket"></i>
                                                    &nbsp; Add To Cart </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>


    @section('styles')
        <style>
            .dt-search {
                display: none;
                /* Menyembunyikan elemen pencarian */
            }
        </style>
    @endsection

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi DataTables
                var table = $('.table').DataTable({
                    searching: true,
                    lengthChange: false,
                    "columnDefs": [{
                        "type": "html",
                        "targets": "_all"
                    }],
                    "order": [
                        [0, "asc"]
                    ]
                });

                // Menggunakan Select2 untuk kolom yang memerlukan
                $('.select2').select2({
                    theme: 'bootstrap-5'
                });

                $('.material_filter').on('change', function() {
                    var value = $(this).find(':selected').data('filter');
                    console.log(value);
                    table.columns(1).search(value).draw();
                });

                $('.spec_filter').on('change', function() {
                    var value = $(this).find(':selected').data('filter');
                    console.log(value);
                    table.columns(2).search(value).draw();
                });

                $('.class_filter').on('change', function() {
                    var value = $(this).find(':selected').data('filter');
                    console.log(value);
                    table.columns(3).search(value).draw();
                });

                $('.conn_filter').on('change', function() {
                    var value = $(this).find(':selected').data('filter');
                    console.log(value);
                    table.columns(4).search(value).draw();
                });

                $('.size_filter').on('change', function() {
                    var value = $(this).find(':selected').data('filter');
                    console.log(value);
                    table.columns(5).search(value).draw();
                });

                $('#filter_all').on('keyup', function() {
                    var value = $(this).val();
                    var columnIndex = $(this).data('column');
                    table.search(value).draw();
                });

            });


            // $(document).ready(function() {
            //     $('#select-ajax').select2({
            //         ajax: {
            //             url: "{{ route('dataMaterial') }}", 
            //             dataType: 'json',
            //             delay: 250, 
            //             processResults: function(data) {
            //                 return {
            //                     results: $.map(data, function(item) {
            //                         return {
            //                             id: item
            //                             .id, 
            //                             text: item
            //                                 .name 
            //                         };
            //                     })
            //                 };
            //             },
            //             cache: true
            //         },
            //         placeholder: 'Pilih data', 
            //         minimumInputLength: 1 
            //     });
            // });
            function addToCart(params) {

                // Inisialisasi array untuk menyimpan nilai item_id
                var itemIdsRaw = [];
                var itemsidRawTable = $('.table').DataTable().column(0).data();
                itemsidRawTable.each(function(value) {
                    itemIdsRaw.push(value);
                });

                // Iterasi melalui semua data dalam kolom
                var itemIds = [];
                var itemDetailIds = [];

                itemIdsRaw.forEach(function(data) {
                    var itemIdMatch = data.match(/name="item_id\[\]" value="(\d+)"/);
                    if (itemIdMatch && itemIdMatch.length > 1) {
                        itemIds.push(itemIdMatch[1]);
                    }

                    var itemDetailIdMatch = data.match(/name="item_detail_id\[\]" value="(\d+)"/);
                    if (itemDetailIdMatch && itemDetailIdMatch.length > 1) {
                        itemDetailIds.push(itemDetailIdMatch[1]);
                    }
                });


                var qtyIdsRaw = [];

                // Mendapatkan elemen-elemen HTML yang dirender oleh DataTables untuk kolom ke-7
                var qtyIdNodes = $('.table').DataTable().column(6).nodes();

                // Iterasi melalui setiap elemen HTML untuk mendapatkan nilai input
                qtyIdNodes.each(function(node) {
                    var value = $(node).find('input').val();
                    qtyIdsRaw.push(value);
                });


                // console.log('Item IDs:', itemIds);
                // console.log('Item Detail IDs:', itemDetailIds);




                $.ajax({
                    url: "{{ route('add-to-cart') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        item: itemIds,
                        item_detail: itemDetailIds,
                        qty: qtyIdsRaw,

                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: response.message,
                            });
                        } else {
                            iziToast.warning({
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        // Menangani kesalahan jika ada
                        // console.error('Kesalahan:', error);
                    }
                });

                // var data = $('.form-data').serialize();
                // console.log(data);
            }
        </script>
    @endsection


</x-app-layout-frontend>