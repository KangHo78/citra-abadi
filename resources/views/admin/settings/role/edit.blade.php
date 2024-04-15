<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Ubah Hak Akses</h4>
                <p class="text-subtitle text-muted">Buat data hak akses dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pengaturan</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored" action="{{ route('role.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                                                class="form-control form-control-lg validation required" value="{{ $data->name }}"
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
                                                @if(in_array("dashboard-total-enquiry", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-total-enquiry" name="dashboard-total-enquiry" style="margin-left: 75px;" checked>
                                                @else
                                                <input class="form-check-input" type="checkbox" value="" id="dashboard-total-enquiry" name="dashboard-total-enquiry" style="margin-left: 75px;" >
                                                @endif
                                                <label class="form-check-label" for="flexCheckChecked"
                                               >
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Permintaan Masuk</span></h6>
                                                <br>
                                                @if(in_array("dashboard-permintaan-masuk", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-permintaan-masuk" name="dashboard-permintaan-masuk" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-permintaan-masuk" name="dashboard-permintaan-masuk" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Penawaran Terkirim</span></h6>
                                                <br>
                                                @if(in_array("dashboard-penawaran-terkirim", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-penawaran-terkirim" name="dashboard-penawaran-terkirim" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-penawaran-terkirim" name="dashboard-penawaran-terkirim" style="margin-left: 75px;" >
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Follow Up</span></h6>
                                                <br>
                                                @if(in_array("dashboard-follow-up", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-follow-up" name="dashboard-follow-up" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-follow-up" name="dashboard-follow-up" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Cancel</span></h6>
                                                <br> 
                                                @if(in_array("dashboard-cancel", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-cancel" name="dashboard-cancel" style="margin-left: 75px;" checked>
                                                @else
                                                <input class="form-check-input" type="checkbox" value="" id="dashboard-cancel" name="dashboard-cancel" style="margin-left: 75px;">
                                                @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Deal</span></h6>
                                                <br>
                                                @if(in_array("dashboard-deal", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-deal" name="dashboard-deal" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-deal" name="dashboard-deal" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Enquiry Chart</span></h6>
                                                <br>
                                                @if(in_array("dashboard-enquiry-chart", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-enquiry-chart" name="dashboard-enquiry-chart" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboard-enquiry-chart" name="dashboard-enquiry-chart" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Enquiry</span></h6>
                                            <div class="col-12">
                                            <br>
                                            @if(in_array("enquiry-create", $permissions))
                                            <input class="form-check-input" type="checkbox" value="" id="enquiry-create" name="enquiry-create" style="margin-left: 25px;" checked>
                                            @else
                                            <input class="form-check-input" type="checkbox" value="" id="enquiry-create" name="enquiry-create" style="margin-left: 25px;">
                                            @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    @if(in_array("enquiry-read", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="enquiry-read" name="enquiry-read" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="enquiry-read" name="enquiry-read" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    @if(in_array("enquiry-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="enquiry-update" name="enquiry-update" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="enquiry-update" name="enquiry-update" style="margin-left: 75px;">
                                                    @endif
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
                                            @if(in_array("item-create", $permissions))
                                            <input class="form-check-input" type="checkbox" value="" id="item-create" name="item-create" style="margin-left: 25px;" checked>
                                            @else
                                            <input class="form-check-input" type="checkbox" value="" id="item-create" name="item-create" style="margin-left: 25px;">
                                            @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    @if(in_array("item-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="item-update" name="item-update" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="item-update" name="item-update" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                    
                                                
                                            
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Merek</span></h6>
                                            <div class="col-12">
                                            <br>
                                            @if(in_array("brand-create", $permissions))
                                            <input class="form-check-input" type="checkbox" value="" id="brand-create" name="brand-create" style="margin-left: 25px;" checked>
                                            @else
                                            <input class="form-check-input" type="checkbox" value="" id="brand-create" name="brand-create" style="margin-left: 25px;">
                                            @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    @if(in_array("brand-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="brand-update" name="brand-update" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="brand-update" name="brand-update" style="margin-left: 75px;">
                                                    @endif
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
                                                @if(in_array("report-enquirer", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="report-enquirer" name="report-enquirer" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="report-enquirer" name="report-enquirer" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                   
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Item</span></h6>
                                                <br>
                                                @if(in_array("report-item", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="report-item" name="report-item"  style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="report-item" name="report-item"  style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                   
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Wishlist</span></h6>
                                                <br>
                                                @if(in_array("report-wishlist", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="report-wishlist" name="report-wishlist"  style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="report-wishlist" name="report-wishlist"  style="margin-left: 75px;" >

                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Share Produk</span></h6>
                                                <br>
                                                @if(in_array("report-share-product", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="report-share-product" name="report-share-product"  style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="report-share-product" name="report-share-product"  style="margin-left: 75px;" >
                                                    @endif
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
                                                @if(in_array("settings-general", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-general" name="settings-general" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-general" name="settings-general" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                   
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Enquirer</span></h6>
                                                <br>
                                                @if(in_array("settings-enquirer-create", $permissions))
                                                <input class="form-check-input" type="checkbox" value="" id="settings-enquirer-create" name="settings-enquirer-create" style="margin-left: 25px;" checked>
                                                @else
                                                <input class="form-check-input" type="checkbox" value="" id="settings-enquirer-create" name="settings-enquirer-create" style="margin-left: 25px;">
                                                @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                
                                                    @if(in_array("settings-enquirer-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-enquirer-update" name="settings-enquirer-update" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-enquirer-update" name="settings-enquirer-update" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                                                  
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Staf</span></h6>
                                                <br>
                                                @if(in_array("settings-staff-create", $permissions))
                                                <input class="form-check-input" type="checkbox" value="" id="settings-staff-create" name="settings-staff-create" style="margin-left: 25px;" checked>
                                                @else
                                                <input class="form-check-input" type="checkbox" value="" id="settings-staff-create" name="settings-staff-create" style="margin-left: 25px;">
                                                @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    @if(in_array("settings-staff-read", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-staff-read" name="settings-staff-read" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-staff-read" name="settings-staff-read" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    @if(in_array("settings-staff-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-staff-update" name="settings-staff-update" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-staff-update" name="settings-staff-update" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
                        
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>Hak Akses</span></h6>
                                                <br>
                                                @if(in_array("settings-role-create", $permissions))
                                                <input class="form-check-input" type="checkbox" value="" id="settings-role-create" name="settings-role-create"style="margin-left: 25px;" checked>
                                                @else
                                                <input class="form-check-input" type="checkbox" value="" id="settings-role-create" name="settings-role-create"style="margin-left: 25px;">
                                                @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tambah
                                                    @if(in_array("settings-role-read", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-role-read" name="settings-role-read" style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-role-read" name="settings-role-read" style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Lihat
                                                    @if(in_array("settings-role-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-role-update" name="settings-role-update"  style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-role-update" name="settings-role-update"  style="margin-left: 75px;">
                                                    @endif
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ubah
            
                                            
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <h6 class="form-label" style="margin-left: 25px"><span>About Us</span></h6>
                                                
                                    
                                                @if(in_array("settings-about-us-update", $permissions))
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-about-us-update" name="settings-about-us-update"  style="margin-left: 75px;" checked>
                                                    @else
                                                    <input class="form-check-input" type="checkbox" value="" id="settings-about-us-update" name="settings-about-us-update"  style="margin-left: 75px;">
                                                    @endif
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
