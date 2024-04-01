<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Tambah Enquiry</h4>
                <p class="text-subtitle text-muted">Buat data enquiry dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Enquiry</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <form id="stored" action="{{route('transaction.sales.create')}}" method="POST" enctype="multipart/form-data">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-sm-12 col-lg-8 col-md-12">


                    <div class="parent">
                        <input name="features" type="hidden" id="features" placeholder="-" class=" "
                            value="Sale">
                    </div>
                    <div class="parent">
                        <input name="branch_id" type="hidden" id="branch_id" placeholder="-" class=" "
                            value="1">
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
                                            <input name="code" type="text" id="code"
                                                value="{{ $data['code'] }}"
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
                                                    value="" style="background-color:#eeeeee"
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly" name="date" id="date">
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
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Status</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="status" id="status">
                                                <option value="" selected="">- Select -</option>
                                                <option value="1" >
                                                    Permintaan Masuk
                                                </option>
                                                <option value="1" >
                                                    Penawaran Terkirim
                                                </option>
                                                <option value="1" >
                                                    Follow Up
                                                </option>
                                                <option value="1" >
                                                    Deal
                                                </option>
                                                <option value="1" >
                                                    Cancel
                                                </option>
                                    
                                            </select>
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
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected="">- Select -</option>
                                                @foreach($data['customer'] as $cust)
                                                <option value="{{ $cust->id }}" data-name="{{ $cust->name }}"
                                                    data-code="{{ $cust->code }}" data-phone="{{ $cust->phone }}"
                                                    data-address="-">{{ $cust->code }}
                                                    {{ $cust->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama Customer</span></h6>
                                            <input name="customer_name" type="text" id="customer_name"
                                                placeholder="Nama Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color: #eeeeee" value="">

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Tlp Customer</span></h6>
                                            <input name="customer_phone" type="text" id="customer_phone"
                                                placeholder="Tlp Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color: #eeeeee" value="">

                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Email Customer</span></h6>
                                            <input name="customer_email" type="text" id="customer_email"
                                                placeholder="Email Customer"
                                                class="form-control form-control-lg validation required"
                                                readonly="" style="background-color: #eeeeee" value="">

                                        </div>
                                    </div>
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
                            <label class="text-xl fw-bold my-auto">Harga</label>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                        <h6 class="form-label"><span>Harga</span></h6>
                                        <input name="price" type="text" id="price" placeholder="0"
                                            class="form-control form-control-lg " value="" readonly=""
                                            style="background-color:#eeeeee">
                                    </div>
                                </div>

                                
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nilai (Rp)</span></h6>
                                            <input name="discount_value" type="text" id="discount_value"
                                                placeholder="Nilai (Rp)"
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
                            <button class="btn btn-outline-info rounded-pill float-end pr-2" type="button"
                                onclick="addNew()">
                                Tambah data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dropHere">
                        
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="button"
                                onclick="save()">
                                Simpan Data & Email
                            </button>
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="button"
                                onclick="save()">
                                Simpan Data
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </form>

@section('scripts')
        <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                console.log('date');
                var currentDate = new Date();
                var currentMonth = (currentDate.getMonth() + 1) + '';
                document.getElementById('date').value = currentDate.getDate().toString().padStart(2, '0')+'/'+ currentMonth.padStart(2, '0')+'/'+(currentDate.getYear() + 1900);
            });
            
            // $('#customer_id').select2({
            //     ajax({
                    
            //         url: '{{route('customer.search')}}',
            //         type: 'POST',
            //         data: {
            //             keyword: keyword_input,
            //             page: false
            //         },
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //        processResults: function(data) {
            //         return {
            //             results: data
            //         }
            //        }
            //     });
                
            // });
            $('#customer_id').on('change', function(){
                // document.getElementById('customer_phone').value = ;
            });
            $('#discount_value').on('keyup', function (){
                console.log('calcSubTotal');
                var totalPrice = $('#price').val() - $('#discount_value').val()
                if(totalPrice < 0) {
                    document.getElementById('discount_value').value = $('#price').val();
                    document.getElementById('total_price').value = 0;
                } else {
                    document.getElementById('total_price').value = totalPrice;
                }
            });
            function addNew(params) {
                $('.dropHere').append(`
                <div class="row dataDetail" style="margin-bottom: -20px;">
                <input name="dt[]" type="hidden" class="dt" value="0">
                <input name="current_stock[]" class="current_stock" type="hidden">

                <div class="col-sm-12 col-lg-4">
                    <div class="form-group pb-3">
                        <select class="select2 form-select form-control-lg validation required"
                                                name="item" id="item">
                                                <option value="" selected="">- Select -</option>
                                                
                                                <option value="26" data-name="PAK MUL #5"
                                                    data-code="CUS01240030001" data-phone="081332333095"
                                                    data-address="-">[CUS01240030001]
                                                    Paku Reng
                                                </option>

                                                <option value="26" data-name="PAK MUL #5"
                                                    data-code="CUS01240030001" data-phone="081332333095"
                                                    data-address="-">[CUS01240030001]
                                                    Asbes
                                                </option>

                                            </select>
                    </div>

                   
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="form-group pb-3">
                        <input name="price_dt[]" type="text" id="" placeholder="0" onkeyup="calcSubTotal()"
                            class="form-control form-control-lg sumTotal text-end numberFormat validation price_dt"
                            value="0">
                    </div>
                    <p class="float-end" style="margin-top: -20px"> Total : <input type="text"
                            style="pointer-events:none"
                            class="removeField border-0 bg-transparent text-end price_total_dt">
                    </p>
                </div>
                <div class="col-sm-6 col-lg-1">
                    <div class="form-group pb-3">
                        <input name="qty_dt[]" value="1" type="text" id="" placeholder="0"
                            onkeyup="calcSubTotal()"
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
                    <button style="margin-top:2px" class="btn btn-outline-danger rounded-pill"
                        onclick="removeDetail(this)" type="button">
                        <i class="bi bi-close"></i> X
                    </button>
                </div>
            </div>`);
            }
        </script>
    @endsection
    </x-app-layout>