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

                        @if (count($carts) > 0)
                            <form action="#" class="form-data">
                                @foreach ($carts as $el)
                                    <input type="hidden" name="id[]" value="{{ $el->id }}">
                                    <div class="spacer-20 item_data_{{ $el->id }}"></div>
                                    <div class="switch-with-title s2 item_data_{{ $el->id }}">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3">
                                                <img src="https://images.tokopedia.net/img/cache/900/VqbcmM/2022/5/31/d433e28b-a196-4417-91f5-febc740cb744.jpg"
                                                    class="lazy nft__item_preview" alt="" width="100px">
                                            </div>
                                            <div class="col-md-10 col-sm-9">
                                                <h5>{{ $el->item->name }} <u>( {{ $el->item_detail->sku }} )</u> </h5>
                                                <div class="de-switch">
                                                    <div class="row">
                                                        <input type="checkbox" id="notif-item-sold" class="checkbox">
                                                        <span onclick="decreaseQuantity('{{ $el->id }}')"
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
                                                                class="form-control text-center item_qty_{{ $el->id }}"
                                                                value="{{ $el->qty }}"
                                                                onkeyup="syncQuantity('{{ $el->id }}')">
                                                        </div>
                                                        <input type="checkbox" id="notif-item-sold" class="checkbox">
                                                        <span onclick="addQuantity('{{ $el->id }}')"
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
                                                        <span onclick="removeItemCart('{{ $el->id }}')"
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
                                                <p><u>( {{ $el->item_detail->material->name }} ,
                                                        {{ $el->item_detail->spec->name }} ,
                                                        {{ $el->item_detail->classes->name }}
                                                        , {{ $el->item_detail->conn->name }} ,
                                                        {{ $el->item_detail->size->name }} )</u></p>
                                                <div class="clearfix"></div>

                                                <input type="text" name="description[]" id="description"
                                                    class="form-control" placeholder="Enter description"
                                                    value="{{ $el->description }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </form>

                            <div class="spacer-20"></div>

                            <div class="col-12">

                                <button class="btn-main float-end" onclick="checkout()"> <i
                                        class="fa fa-shopping-cart"></i>
                                    &nbsp;
                                    Checkout</button>
                            </div>
                        @else
                            <h4 class="text-center">Keranjang Kamu Masih Kosong</h4>
                        @endif


                    </div>
                </div>
            </div>
        </section>

    </div>


    @section('scripts')
        <script>
            function removeItemCart(params) {
                $.ajax({
                    url: "{{ route('remove-item-cart') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: params,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: response.message,
                            });

                            $('.item_data_' + response.id).remove();
                        } else {
                            iziToast.warning({
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        iziToast.error({
                            title: 'Pemberitahuan',
                            message: response.message,
                        });
                    }
                });
            }


            function addQuantity(params) {

                var qtyInput = $('.item_qty_' + params);
                var currentQty = parseInt(qtyInput.val());
                // Menambahkan 2 ke nilai quantity saat ini
                var newQty = currentQty + 1;
                // Mengupdate nilai quantity pada input
                qtyInput.val(newQty);


                var xhr = null; // Variabel untuk menyimpan objek permintaan Ajax
                if (xhr && xhr.readyState !== 4) {
                    // Batalkan permintaan sebelumnya
                    xhr.abort();
                }
                xhr = $.ajax({
                    url: "{{ route('add-quantity-item-cart') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        qty: newQty,
                        id: params,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                displayMode: 'once',
                                title: 'Berhasil',
                                message: response.message,
                            });

                        } else {
                            iziToast.warning({
                                displayMode: 'once',
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        iziToast.error({
                            displayMode: 'once',
                            title: 'Pemberitahuan',
                            message: xhr,
                        });
                    }
                });
            }

            function decreaseQuantity(params) {

                var qtyInput = $('.item_qty_' + params);
                var currentQty = parseInt(qtyInput.val());
                // Menambahkan 2 ke nilai quantity saat ini
                // Mengupdate nilai quantity pada input
                var newQty = Math.max(1, currentQty - 1);


                qtyInput.val(newQty);


                var xhr = null; // Variabel untuk menyimpan objek permintaan Ajax
                if (xhr && xhr.readyState !== 4) {
                    // Batalkan permintaan sebelumnya
                    xhr.abort();
                }
                xhr = $.ajax({
                    url: "{{ route('decrease-quantity-item-cart') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        qty: newQty,
                        id: params,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                displayMode: 'once',
                                title: 'Berhasil',
                                message: response.message,
                            });

                        } else {
                            iziToast.warning({
                                displayMode: 'once',
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        iziToast.error({
                            displayMode: 'once',
                            title: 'Pemberitahuan',
                            message: xhr,
                        });
                    }
                });
            }


            function syncQuantity(params) {

                var qtyInput = $('.item_qty_' + params).val();


                if (qtyInput == null || qtyInput == '' || qtyInput == NaN) {
                    $('.item_qty_' + params).val(1);
                    var currentQty = 1;
                } else {
                    var currentQty = parseInt(qtyInput);

                }



                var xhr = null; // Variabel untuk menyimpan objek permintaan Ajax
                if (xhr && xhr.readyState !== 4) {
                    // Batalkan permintaan sebelumnya
                    xhr.abort();
                }
                xhr = $.ajax({
                    url: "{{ route('sync-quantity-item-cart') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        qty: currentQty,
                        id: params,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                displayMode: 'once',
                                title: 'Berhasil',
                                message: response.message,
                            });

                        } else {
                            iziToast.warning({
                                displayMode: 'once',
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        iziToast.error({
                            displayMode: 'once',
                            title: 'Pemberitahuan',
                            message: xhr,
                        });
                    }
                });
            }




            function checkout(params) {

                $.ajax({
                    url: "{{ route('place-order') }}", // Ganti dengan URL endpoint Anda
                    method: 'POST',
                    dataType: 'json',
                    data: $('.form-data').serialize() + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
                    success: function(response) {
                        // Menangani respons dari server jika diperlukan
                        if (response.type == 'success') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: response.message,
                            });

                            location.reload();
                          

                        } else {
                            iziToast.warning({
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                        }
                        // window.open('mailto:test@example.com?subject=Testing out mailto!&body=' + 'a' + '!',
                                // '_blank');

                    },
                    error: function(xhr, status, error) {
                        iziToast.error({
                            title: 'Pemberitahuan',
                            message: response.message,
                        });
                    }
                });
            }
        </script>
    @endsection


</x-app-layout-frontend>
