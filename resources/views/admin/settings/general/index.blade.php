<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Pengaturan Umum</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pengaturan</li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored" action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
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
                                    
                                    {{-- <div class="col-6">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Akun</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected="">- Select -</option>
                                                <option value="1" data-name="ONE TIME CUSTOMER" data-code="NON"
                                                    data-phone="-" data-address="-">[NON]
                                                    ONE TIME CUSTOMER
                                                </option>
                                                <option value="25" data-name="BU MERRY #1"
                                                    data-code="CUS01240010001" data-phone="08123480519"
                                                    data-address="-">[CUS01240010001]
                                                    BU MERRY #1
                                                </option>
                                                <option value="26" data-name="PAK MUL #5"
                                                    data-code="CUS01240030001" data-phone="081332333095"
                                                    data-address="-">[CUS01240030001]
                                                    PAK MUL #5
                                                </option>
                                            </select>

                                        </div>
                                    </div> --}}

                                </div>
        
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Address</span></h6>
                                            <input name="address" type="text" id="address"
                                                placeholder="Address" class="form-control form-control-lg "
                                                value="{{ env('APP_ADDRESS') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat Email</span></h6>
                                            <input name="email" type="text" id="email"
                                                placeholder="Alamat Email" class="form-control form-control-lg "
                                                value="{{ env('MAIL_FROM_ADDRESS') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nomor telpon</span></h6>
                                            <input name="phone" type="text" id="phone"
                                                placeholder="0811111111" class="form-control form-control-lg "
                                                value="{{ env('APP_PHONE') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Logo</span></h6>
                                            <img src="{{\Illuminate\Support\Facades\Storage::disk('local')->url('/front-end/images/logo-light.png')}}" width="300px"></img>
                                            <input name="logo" type="file" id="logo"
                                                 class="form-control form-control-lg ">
                                        </div>
                                    </div>
                                </div>
                               
                               
                                <!-- <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Banner 1</span></h6>
                                            <input name="description" type="file" id="description"
                                                placeholder="Pilih File" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Banner 2</span></h6>
                                            <input name="description" type="file" id="description"
                                                placeholder="Pilih File" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                   

                </div>
               
        </section>

        <section class="section">
            <div class="card">
               
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="submit"
                                >
                                Simpan Pengaturan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-app-layout>
