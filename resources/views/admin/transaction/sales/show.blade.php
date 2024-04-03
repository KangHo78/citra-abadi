<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Lihat Enquiry</h4>
                <p class="text-subtitle text-muted">Lihat data enquiry dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Enquiry</li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <form id="stored" action="{{ route('transaction.sales.update', $data['data']->id) }}" method="POST"
        enctype="multipart/form-data" style="pointer-events: none">
        @csrf
        @method('PUT')
        <section id="multiple-column-form" >
            <div class="row match-height">
                <div class="col-sm-12 col-lg-8 col-md-12">


                    <div class="parent">
                        <input name="features" type="hidden" id="features" placeholder="-" class=" "
                            value="Sale">
                    </div>
                    <div class="parent">
                        <input name="id" type="hidden" id="id" placeholder="-" class=" "
                            value="{{$data['data']->id}}">
                    </div>

                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <label class="text-xl fw-bold my-auto">Form Data</label>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Kode</span></h6>
                                            <input name="code" type="text" readonly id="code"
                                                value="{{ $data['data']->code }}"
                                                class="form-control form-control-lg validation required" value=""
                                                readonly="" style="background-color:#eeeeee">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Tanggal</span></h6>
                                            <div class="input-group mb-1">
                                                <span style="padding-bottom: 16px;" class="input-group-text"><i
                                                        class="bi bi-calendar"></i></span>
                                                <input name="dateBackground" id="dateBackground" placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="{{date('d/m/Y',strtotime($data['data']->date))}}" style="background-color:#eeeeee"
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text" readonly="readonly"
                                                    name="date" id="date" value="{{date('d/m/Y',strtotime($data['data']->date))}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Deskripsi</span></h6>
                                            <input name="desc" type="text" id="desc"
                                                placeholder="Description" class="form-control form-control-lg "
                                                value="{{ $data['data']->desc }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <label class="text-xl fw-bold my-auto">Customer</label>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Customer</span></h6>
                                            <select class=" form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id" onchange="changeCustomer()">
                                                <option value="" selected="">- Select -</option>
                                                @foreach ($data['customer'] as $cust)
                                                    <option value="{{ $cust->id }}" data-name="{{ $cust->name }}"
                                                        data-code="{{ $cust->code }}"
                                                        data-phone="{{ $cust->phone }}" data-address="-"
                                                        @if ($data['data']->customer_id) selected @endif>
                                                        {{ $cust->code }} - {{ $cust->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama Customer</span></h6>
                                            <input name="customer_name" type="text" id="customer_name"
                                                placeholder="Nama Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color: #eeeeee" value="">

                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Tlp Customer</span></h6>
                                            <input name="customer_phone" type="text" id="customer_phone"
                                                placeholder="Tlp Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color: #eeeeee" value="">

                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Email Customer</span></h6>
                                            <input name="customer_email" type="text" id="customer_email"
                                                placeholder="Email Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color: #eeeeee" value="">

                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <!-- <div class="col-sm-6 col-lg-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Fukle</span></h6>
                                            <input name="customer_phone" type="text" id="customer_phone"
                                                placeholder="Tlp Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color:#eeeeee" value="08123456789">

                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-lg-4 col-md-12">


                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <label class="text-xl fw-bold my-auto">Status</label>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                        <h6 class="form-label"><span>Status</span></h6>
                                        <select class=" form-select form-control-lg validation required"
                                            name="status" id="status">
                                            <option value="">- Select -</option>
                                            <option value="1" @selected($data['data']->status == 1)>
                                                Permintaan Masuk
                                            </option>
                                            <option value="2" @selected($data['data']->status == 2)>
                                                Penawaran Terkirim
                                            </option>
                                            <option value="3" @selected($data['data']->status == 3)>
                                                Follow Up
                                            </option>
                                            <option value="4" @selected($data['data']->status == 4)>
                                                Deal
                                            </option>
                                            <option value="5" @selected($data['data']->status == 5)>
                                                Cancel
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <label class="text-xl fw-bold my-auto">Harga</label>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                        <h6 class="form-label"><span>Harga</span></h6>
                                        <input name="price" type="text" id="price" placeholder="0"
                                            class="form-control form-control-lg text-end numberFormat" value="0"
                                            readonly="" style="background-color:#eeeeee">
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Diskon</span></h6>
                                            <input name="discount_value" type="text" id="discount_value"
                                                onkeyup="calc()" placeholder="Nilai (Rp)"
                                                class="form-control form-control-lg text-end numberFormat"
                                                value="0">


                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                        <h6 class="form-label"><span>Total Harga</span></h6>
                                        <input name="total_price" type="text" id="total_price" placeholder="0"
                                            class="form-control form-control-lg text-end numberFormat" value="0"
                                            readonly="" style="background-color:#eeeeee">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6 text-start">
                                    <h4 class="card-title ">Data Detail</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                           
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3">
                            <h6>Item (detail)</h6>
                        </div>
                        <div class="col-sm-12 col-lg-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-sm-12 col-lg-2">
                            <h6>Qty</h6>
                        </div>
                        <div class="col-sm-12 col-lg-3">
                            <h6>Desc</h6>
                        </div>
                        <div class="col-sm-12 col-lg-1">
                            <h6>#</h6>
                        </div>
                    </div>
                    {{-- @foreach ($data['data']->enquiry_detail as $el)
                        <div class="row dataDetail" style="margin-bottom: 5px;">
                            <input name="dt[]" type="hidden" class="dt" value="{{ $el->id }}">

                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group pb-3">
                                    <select
                                        class="select2 form-select form-control-lg validation required item_detail_id"
                                        name="item_detail_id[]">
                                        <option value="">- Select -</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group pb-3">
                                    <input name="price_dt[]" type="text" id="" placeholder="0"
                                        onkeyup="calc()"
                                        class="form-control form-control-lg sumTotal text-end numberFormat validation price_dt"
                                        value="0">
                                </div>
                                <p class="float-end" style="margin-top: -20px"> Total : <input type="text"
                                        style="pointer-events:none"
                                        class="removeField border-0 bg-transparent text-end price_total_dt">
                                </p>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="form-group pb-3">
                                    <input name="qty_dt[]" value="1" type="text" id=""
                                        placeholder="0" onkeyup="calc()"
                                        class="form-control form-control-lg validation numberFormat text-end qty_dt">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group pb-3">
                                    <input name="description_dt[]" type="text" id=""
                                        placeholder="Description"
                                        class="form-control form-control-lg validation description_dt" value="">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-1">
                                <button style="margin-top:2px" class="btn btn-outline-danger rounded-pill"
                                    onclick="removeDetail(this)" type="button">
                                    <i class="bi bi-close"></i> X
                                </button>
                            </div>
                        </div>
                    @endforeach --}}
                    <div class="dropHere">

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            {{-- <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="button"
                                onclick="save()">
                                Simpan Data & Email
                            </button> --}}
                         
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>

    @section('scripts')
        <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
        <script type="text/javascript">
            let text = `
                    <div class="row dataDetail" style="margin-bottom: 5px;">
                        <input name="dt[]" type="hidden" class="dt" value="0">

                        <div class="col-sm-12 col-lg-3">
                            <div class="form-group pb-3">
                                <select class="select2 form-select form-control-lg validation required item_detail_id"
                                    name="item_detail_id[]">
                                    <option value="" selected="">- Select -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group pb-3">
                                <input name="price_dt[]" type="text" id="" placeholder="0" onkeyup="calc()"
                                    class="form-control form-control-lg sumTotal text-end numberFormat validation price_dt"
                                    value="0">
                            </div>
                            <p class="float-end" style="margin-top: -20px"> Total : <input type="text"
                                    style="pointer-events:none"
                                    class="removeField border-0 bg-transparent text-end price_total_dt">
                            </p>
                        </div>
                        <div class="col-sm-6 col-lg-2">
                            <div class="form-group pb-3">
                                <input name="qty_dt[]" value="1" type="text" id="" placeholder="0"
                                    onkeyup="calc()"
                                    class="form-control form-control-lg validation numberFormat text-end qty_dt">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3">
                            <div class="form-group pb-3">
                                <input name="description_dt[]" type="text" id="" placeholder="Description"
                                    class="form-control form-control-lg validation description_dt" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-1">
                            <button style="margin-top:2px" class="btn btn-outline-secodary rounded-pill"
                                onclick="#" type="button">
                                <i class="bi bi-close"></i> X
                            </button>
                        </div>
                </div>`;

            $(document).ready(function() {

                initializeEdit();

                changeCustomer();


            });



            var detail = [];
            @foreach ($data['data']->enquiry_detail as $el)
                detail.push({!! $el !!});
            @endforeach

            function initializeEdit(params) {
                detail.forEach((d, i) => {
                    console.log(d);
                    $('.dropHere').append(
                        text
                    );
                    $('.item_detail_id').last().append(new Option(d.item.name + ' (' + d.item_detail.sku + ') ', d
                        .item_detail_id, true, true)).trigger(
                        'change.select2');

                    $('.price_dt').last().val(accounting.formatNumber(d.item_price, {
                        precision: 0
                    }));

                    $('.qty_dt').last().val(accounting.formatNumber(d.item_quantity, {
                        precision: 0
                    }));

                    $('.description_dt').last().val(d.description);
                    $('.dt').last().val(d.id);
                    
                    reinitialize();
                });
                calc();
            }


            // $('#discount_value').on('keyup', function() {
            //     var totalPrice = $('#price').val() - $('#discount_value').val()
            //     if (totalPrice < 0) {
            //         document.getElementById('discount_value').value = $('#price').val();
            //         document.getElementById('total_price').value = 0;
            //     } else {
            //         document.getElementById('total_price').value = totalPrice;
            //     }
            // });



            function addNew(params) {

                $('.dropHere').append(
                    text
                );

                reinitialize();

            }


            function reinitialize() {
                // console.log('rn');
                $(".numberFormat")
                    .toArray()
                    .forEach(function(field) {
                        new Cleave(field, {
                            numeral: true,
                            numeralThousandsGroupStyle: "thousand",
                        });
                    });
                // Panggil select2() pada semua elemen dengan kelas .select2
                $('.item_detail_id').each(function() {
                    $('.item_detail_id').last().select2({
                        ajax: {
                            url: "{{ route('transaction.sales.get-data-item-detail') }}", // Ganti dengan URL endpoint Anda
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                console.log(params);
                                return {
                                    q: params.term,
                                };

                            },
                            processResults: function(data) {
                                // console.log(data);
                                console.log($(this).parents('.dataDetail'));

                                return {
                                    results: data
                                };
                            },
                            cache: true
                        },
                        minimumInputLength: 1 // Jumlah minimum karakter sebelum pencarian dimulai
                    });
                });

                $('.item_detail_id').on('select2:select', function(event) {
                    var par = $(this).parents('.dataDetail');
                    var data = event.params.data;
                    $(par).find('.price_dt').val(data.price);
                    calc();
                });
            }

            function removeDetail(dom) {
                var par = $(dom).parents('.dataDetail');
                $(par).remove();
                calc();
            }


            function calc(params) {
                var totalPrice = 0;
                $('.dataDetail').each(function() {
                    var qty = $(this).find('.qty_dt').val().replace(/[^0-9\-]+/g, "") * 1;
                    var priceDetail = $(this).find('.price_dt').length != 0 ? $(this).find('.price_dt').val().replace(
                        /[^0-9\-]+/g, "") * 1 : 0;
                    var total = qty * priceDetail;
                    $(this).find('.price_total_dt').val(accounting.formatNumber(total, {
                        precision: 0
                    }));
                    totalPrice += total;
                })

                $('#price').val(accounting.formatNumber(totalPrice, {
                    precision: 0
                }));

                var discountValue = $('#discount_value').length != 0 ? $('#discount_value').val().replace(
                    /[^0-9\-]+/g, "") * 1 : 0;

                var totalGrand = totalPrice - discountValue;
                if (totalGrand < 0) {
                    $('#discount_value').val(accounting.formatNumber(totalPrice, {
                        precision: 0
                    }));
                    $('#total_price').val(0);
                } else {
                    $('#total_price').val(accounting.formatNumber(totalGrand, {
                        precision: 0
                    }));
                }

                $('#total_price').val(accounting.formatNumber(totalGrand, {
                    precision: 0
                }));

            }
            function changeCustomer() {
                var cus = $('#customer_id').find(':selected');
                var name = cus.data('name');
                var phone = cus.data('phone');
                var email = cus.data('email');

                $('#customer_name').val(name);
                $('#customer_phone').val(phone);
                $('#customer_email').val(email);
            }
        </script>
    @endsection
</x-app-layout>
