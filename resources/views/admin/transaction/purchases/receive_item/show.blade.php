<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Lihat Penerimaan</h4>
                <p class="text-subtitle text-muted">Buat data transaksi dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Penerimaan</li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored">
        <section id="multiple-column-form">
            <div class="row match-height">
            <div class="col-12 col-md-6 order-md-1 order-last">


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
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Form Code</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Form Code"
                                                class="form-control form-control-lg validation required" value=""
                                                readonly="" style="background-color:#eeeeee">

                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Receipt Code</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Receipt Code" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    
                                </div>
                                    <div class="col-12">
                                        <div class="form-group parent">
                                            <h6 class="form-label"><span>Tanggal</span></h6>
                                            <div class="input-group mb-1">
                                                <span style="padding-bottom: 16px;" class="input-group-text"><i
                                                        class="bi bi-calendar"></i></span>
                                                        <input name="date" id="date" placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="2024-02-02" readonly="" style="background-color:#eeeeee"
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly">

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                <div class="col-12"><div class="form-group parent" style="">
                                    <h6 class="form-label"><span>Pembelian</span></h6>
                                                <select class="select2 form-select form-control-lg validation required"
                                                    name="customer_id" id="customer_id">
                                                    <option value="" selected="">- Select -</option>
                                                    <option value="1" data-name="ONE TIME CUSTOMER" data-code="NON"
                                                        data-phone="-" data-address="-">[NON]
                                                        PO01240010001
                                                    </option>
                                                    <option value="25" data-name="BU MERRY #1"
                                                        data-code="CUS01240010001" data-phone="08123480519"
                                                        data-address="-">[PO01240010002]
                                                        PO01240010002
                                                    </option>
                                                    <option value="26" data-name="PAK MUL #5"
                                                        data-code="CUS01240030001" data-phone="081332333095"
                                                        data-address="-">[PO01240010003]
                                                        PO01240010003
                                                    </option>
                                                </select>
                                </div>
</div></div>
                                    
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Deskripsi</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Description" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Pengirim</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Pengirim" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
</div>
<div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Diterima oleh</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Diterima oleh" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
</div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Delivery Order Supplier</span></h6>
                                            <input name="code" type="file" id="code"
                                                placeholder="Form Code"
                                                class="form-control form-control-lg validation required" value="081111111"
                                                >

                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                                    </div>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <label class="text-xl fw-bold my-auto">Vendor</label>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Vendor</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Form Code"
                                                class="form-control form-control-lg validation required" value="VNDR001"
                                                readonly="" style="background-color:#eeeeee">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama Vendor</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Form Code"
                                                class="form-control form-control-lg validation required" value="VENDOR 1"
                                                readonly="" style="background-color:#eeeeee">

                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Telpon Vendor</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Form Code"
                                                class="form-control form-control-lg validation required" value="081111111"
                                                readonly="" style="background-color:#eeeeee">

                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat Vendor</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Form Code"
                                                class="form-control form-control-lg validation required" value="Jl. Ajayan No. 1, Kota Mojokerto"
                                                readonly="" style="background-color:#eeeeee">

                                        </div>
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
                                    <h4 class="card-title ">Checklist Item</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                           
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="dropHere">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                
                                <th>SKU</th>
                                <th>Item Description</th>
                                <th>Quantity</th>
                                <th>Diterima</th>
                                <th>Tersisa</th>
                                <th>Warehouse</th>
                                <th>SN</th>
                                <!-- <th>Status</th>
                                <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                
                            <tr>
                                <td>SKU02939{{$i}}</td>
                                <td>Item Desc {{$i}}</td>
                                <td>
                                1
                                </td>
                                <td> <input type="number" id="choose-item-2" name="choose-item"></td>
                                <td>
                                1
                                </td>
                                <td>
                                    Warehouse A
                                </td>
                                <td>SN33233{{$i}}</td>
                                <!-- <td>
                                    <span class="badge bg-success">Diterima</span>
                                </td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a href="{{route('transaction.sales.show',$i)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <b class="p-2">Lihat</b>
                                                </a>
                                                <a href="{{route('transaction.sales.edit',$i)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-pencil text-warning"></i>
                                                    <b class="p-2">Ubah</b>
                                                </a>
                                                <a href="{{route('transaction.sales.print',$i)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-printer text-primary"></i>
                                                    <b class="p-2">Cetak</b>
                                                </a>
                                                <input type="hidden" name="_token"
                                                    value="5hxXelPptFRbbrxW4qS2IFpmhEtzy5g46YNK8piJ">
                                                <a class="dropdown-item" data-bs-toggle="tooltip" title="Delete Data"
                                                    onclick="destroy('https://atmanegara.com/transaction/service/service/127')"
                                                    href="javascript:;">
                                                    <i class="bi bi-trash text-danger"></i>
                                                    <b class="p-2">Hapus</b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td> -->
                            </tr>
                            @endfor

                        </tbody>
                    </table>
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
            </div>
        </section>
    </form>
</x-app-layout>
