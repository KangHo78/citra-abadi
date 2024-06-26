<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Lihat Gudang</h4>
                <p class="text-subtitle text-muted">Buat data gudang dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Item</li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">


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
                                                placeholder="Kode Gudang"
                                                class="form-control form-control-lg validation required" value=""
                                            >

                                        </div>
                                    </div>
                                    
                                </div>
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
                                            <h6 class="form-label"><span>Nama</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Nama" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Alamat" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama PIC</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Nama PIC" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Telpon</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Telepon" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nomor rekening</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Nomor rekening" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama rekening</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Nama rekening" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Bank rekening</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Bank rekening" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="button"
                                onclick="save()">
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </div>
        </section>

       
    </form>
</x-app-layout>
