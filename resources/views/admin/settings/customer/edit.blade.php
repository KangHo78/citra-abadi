<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Ubah Enquirer</h4>
                <p class="text-subtitle text-muted">Buat data transaksi dan isi form dibawah.</p>
                @if (isset($errors) && $errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-subtitle text-danger">*{{ $error }}</p>
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Enquirer</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored" action="{{ route('customer.update', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <h6 class="form-label"><span>Kode</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="CUS000001"
                                                class="form-control form-control-lg validation required" readonly="" value="{{ $data->code }}"
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
                                                value="{{ $data->company_name }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat</span></h6>
                                            <input name="address" type="text" id="address"
                                                placeholder="Alamat" class="form-control form-control-lg "
                                                value="{{ $data->address }}">
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
                                                value="{{ $data->address_2 }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Telepon / WA</span></h6>
                                            <input name="phone" type="text" id="phone"
                                                placeholder="Telepon" class="form-control form-control-lg "
                                                value="{{ $data->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama PIC</span></h6>
                                            <input name="name" type="text" id="name"
                                                placeholder="Nama PIC" class="form-control form-control-lg "
                                                value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Email</span></h6>
                                            <input name="email" type="text" id="email"
                                                placeholder="Email" class="form-control form-control-lg "
                                                value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Position</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="position" id="position">
                                                @if(empty($data->position) || $data->position == 0)
                                                <option value="0" selected="">- Select -</option>
                                                @else
                                                <option value="0">- Select -</option>
                                                @endif
                                                @if($data->position == 1)
                                                <option value="1" selected="">Owner</option>
                                                @else
                                                <option value="1">Owner</option>
                                                @endif
                                                @if($data->position == 2)
                                                <option value="2" selected>Purchaser</option>
                                                @else
                                                <option value="2">Purchaser</option>
                                                @endif
                                                @if($data->position == 3)
                                                <option value="3" selected="">Estimator</option>
                                                @else
                                                <option value="3">Estimator</option>
                                                @endif
                                                @if($data->position == 4)
                                                <option value="4" selected="">Engineer</option>
                                                @else
                                                <option value="4">Engineer</option>
                                                @endif
                                                @if($data->position == 5)
                                                <option value="5" selected="">Lainnya</option>
                                                @else
                                                <option value="5">Lainnya</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>NPWP</span></h6>
                                            <input name="npwp" type="text" id="npwp"
                                                 class="form-control form-control-lg "
                                                value="{{ $data->npwp }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>NPWP Photo</span></h6>
                                            @if(!empty($npwp_photo) && $npwp_photo != null)
                                                
                                                <img src="{{$npwp_photo}}" width="300px"></img>
                                                
                                            @endif
                                            <input name="npwp_photo" type="file" id="npwp_photo" class="form-control form-control-lg ">
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
        </section>
    </form>
</x-app-layout>
