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


    <form id="stored" action="{{ route('role.store') }}" method="POST">
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
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama Hak Akses</span></h6>
                                            <input name="name" type="text" id="name"
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
                                            <h6 class="form-label"><span>Dashboard</span></h6>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Total Enquiry</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-total-enquiry" name="dashboard-total-enquiry" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Permintaan Masuk</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-permintaan-masuk" name="dashboard-permintaan-masuk" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Penawaran Terkirim</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-penawaran-terkirim" name="dashboard-penawaran-terkirim" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Follow Up</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-follow-up" name="dashboard-follow-up" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Cancel</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-cancel" name="dashboard-cancel" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Deal</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-deal" name="dashboard-deal" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Enquiry Chart</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-enquiry-chart" name="dashboard-enquiry-chart" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Enquiry</span></h6>
                                            <div class="col-12">
                                            <br>
                                            <input class="form-check-input" type="checkbox" value="" id="enquiry-create" name="enquiry-create" style="margin-left: 25px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="enquiry-read" name="enquiry-read" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="enquiry-update" name="enquiry-update" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    
                                                
                                            
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Item</span></h6>
                                            <div class="col-12">
                                            <br>
                                            <input class="form-check-input" type="checkbox" value="" id="item-create" name="item-create" style="margin-left: 25px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="item-update" name="item-update" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    
                                                
                                            
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Merek</span></h6>
                                            <div class="col-12">
                                            <br>
                                            <input class="form-check-input" type="checkbox" value="" id="brand-create" name="brand-create" style="margin-left: 25px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="brand-update" name="brand-update" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    
                                                
                                            
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Laporan</span></h6>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Enquirer</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="report-enquirer" name="report-enquirer" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                   
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Item</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="report-item" name="report-item"  style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                   
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Wishlist</span></h6>
                                                <br>
                                                
                                                    <input class="form-check-input" type="checkbox" value="" id="report-wishlist" name="report-wishlist"  style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Share Produk</span></h6>
                                                <br>
                                               
                                                    <input class="form-check-input" type="checkbox" value="" id="report-share-product" name="report-share-product"  style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                   
                                            </div>
                                            
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Pengaturan</span></h6>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Umum</span></h6>
                                                <br>
                                               
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-general" name="settings-general" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                   
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Enquirer</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="settings-enquirer-create" name="settings-enquirer-create" style="margin-left: 25px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                    
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-enquirer-update" name="settings-enquirer-update" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                  
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Staf</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="settings-staff-create" name="settings-staff-create" style="margin-left: 25px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-staff-read" name="settings-staff-read" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-staff-update" name="settings-staff-update" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                        
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Hak Akses</span></h6>
                                                <br>
                                                <input class="form-check-input" type="checkbox" value="" id="settings-role-create" name="settings-role-create"style="margin-left: 25px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-role-read" name="settings-role-read" style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-role-update" name="settings-role-update"  style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
            
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>About Us</span></h6>
                                                <br>
                                        
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-about-us-update" name="settings-about-us-update"  style="margin-left: 75px;" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
            
                                            
                                            </div>
                                            
                                        </div>
                                       
                                        
                        </div>
                        
                    </div>
                    

                </div>
               
            </div>
        </section>

        <section class="section">
            <div class="card">
            
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
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="submit"
                                >
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
