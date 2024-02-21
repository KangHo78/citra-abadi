<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Tambah Hak Akses</h4>
                <p class="text-subtitle text-muted">Buat data hak akses dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pengaturan</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored">
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
                                            <h6 class="form-label"><span>Nama Hak Akses</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Hak Akses"
                                                class="form-control form-control-lg validation required" value=""
                                                >

                                        </div>
                                    </div>
                                   
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>

                    <div class="card " style="overflow:scroll; height:400px;">
                        <div class="card-header d-flex justify-content-between">
                            <label class="text-xl fw-bold my-auto">Izin untuk hak akses ini</label>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Customer</span></h6>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Nama</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Kolom A</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Kolom B</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                           
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Tabel A</span></h6>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Nama</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Kolom A</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Kolom B</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Tabel B</span></h6>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Nama</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Kolom A</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Kolom B</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 25px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" style="margin-left: 75px;" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Hapus
                                            
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
                                onclick="addNew()" id="testAdd">
                                Tambah data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dropHere">
                    <div class="row dataDetail" style="margin-bottom: -20px;">
                <input name="dt[]" type="hidden" class="dt" value="0">
                <input name="current_stock[]" class="current_stock" type="hidden">

                <div class="col-sm-12 col-lg-4">
                Nama Staf
                    
                   
                </div>
                <div class="col-sm-6 col-lg-3">
                    
                    Email
                  
                </div>
                
               
                <div class="col-sm-12 col-lg-1">
                  Action
                </div>
            </div>`
                   <!-- <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Item Description</th>
                                <th>Stok Sekarang</th>
                                <th>Stok Baru</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                                    </table> -->
                       <!--   <tbody>
                            
                                
                            <tr>
                                <td> SET121</td>
                                <td> Item Desc</td>
                                <td> 1 </td>
                                <td> 2 </td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a href="{{route('item.show',1)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <b class="p-2">Lihat</b>
                                                </a>
                                                <a href="{{route('item.edit',1)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-pencil text-warning"></i>
                                                    <b class="p-2">Ubah</b>
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
                                </td>
                            </tr>

                        </tbody>
                    </table> -->
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
            <script>
                var myElement = document.getElementById('testAdd');

        myElement.addEventListener('click', function(event) {
        // addNew()
        });
        @section('scripts')
        
        <script>
            function addNew(params) {
                $('.dropHere').append(`
                <div class="row dataDetail" style="margin-bottom: -20px;">
                <input name="dt[]" type="hidden" class="dt" value="0">
                <input name="current_stock[]" class="current_stock" type="hidden">

                <div class="col-sm-12 col-lg-4">
                    <div class="form-group pb-3">
                    <select class="select2 form-select form-control-lg validation required"
                                                name="method_payment" id="method_payment">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Staf 1</option>
                                                <option value="Cash">Staf 2</option>
                                                <option value="Cash">Staf 3</option>
                                            </select>
                    </div>

                   
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="form-group pb-3">
                    <input name="description_dt[]" type="text" id="" placeholder="Email"
                            style="background-color:#eeeeee"
                            class="form-control form-control-lg validation description_dt" value="" readonly="">
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
    </form>
</x-app-layout>
