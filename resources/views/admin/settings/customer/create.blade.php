<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Tambah Enquirer</h4>
                <p class="text-subtitle text-muted">Buat data transaksi dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Enquirer</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored" method="{{ route('customer.store') }}" action="POST">
        @csrf
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
                                                placeholder="CUS000001"
                                                class="form-control form-control-lg validation required" value="{{ $data['code'] }}" readonly="" backgroundColor="#eeeeee"
                                                >

                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                   
                                    

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama Perusahaan</span></h6>
                                            <input name="company_name" type="text" id="company_name"
                                                placeholder="Nama" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat</span></h6>
                                            <input name="address" type="text" id="address"
                                                placeholder="Nama" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat NPWP</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Alamat NPWP" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div> -->
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Kota / Provinsi / Kode Pos</span></h6>
                                            <input name="address_2" type="text" id="address_2"
                                                placeholder="Kota" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Telepon / WA</span></h6>
                                            <input name="phone" type="text" id="phone"
                                                placeholder="Telepon" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama PIC</span></h6>
                                            <input name="name" type="text" id="name"
                                                placeholder="Nama PIC" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Email</span></h6>
                                            <input name="email" type="text" id="email"
                                                placeholder="Email" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Position</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="position" id="position">
                                                <option value="0" selected="">- Select -</option>
                                                <option value="1">Owner</option>
                                                <option value="2">Purchaser</option>
                                                <option value="3">Estimator</option>
                                                <option value="4">Engineer</option>
                                                <option value="5">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>NPWP</span></h6>
                                            <input name="npwp" type="text" id="npwp"
                                                 class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>NPWP Photo</span></h6>
                                            <input name="npwp_photo" type="file" id="npwp_photo">
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
        </section>
    </form>
</x-app-layout>
