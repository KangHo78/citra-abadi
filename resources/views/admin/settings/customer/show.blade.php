@php
\Illuminate\Support\Facades\Log::info($data->company_name);
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Lihat Enquirer</h4>
                <p class="text-subtitle text-muted">Buat data transaksi dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Sales</li>
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
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Kode</span></h6>
                                            <input name="code" type="text" id="code" readonly=""
                                                
                                                class="form-control form-control-lg validation required" value="{{ $data->code }}"
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
                                            <input name="code" type="text" id="code" readonly=""
                                                
                                                class="form-control form-control-lg validation required" value="{{ $data->company_name }}"
                                                >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Alamat</span></h6>
                                            <input name="code" type="text" id="code" readonly=""
                                                
                                                class="form-control form-control-lg validation required" value="{{ $data->address }}"
                                                >
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Kota / Provinsi / Kode Pos</span></h6>
                                            <input name="code" type="text" id="code" readonly=""
                                                
                                                class="form-control form-control-lg validation required" value="{{ $data->address_2 }}"
                                                >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Telepon / WA</span></h6>
                                            <input name="description" type="text" id="description_4"
                                                placeholder="Telepon" class="form-control form-control-lg "
                                                readonly="" value="{{ $data->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama PIC</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Nama PIC" class="form-control form-control-lg "
                                                readonly="" value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Email</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Email" class="form-control form-control-lg "
                                                readonly="" value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Position</span></h6>
                                            @php
                                            $string = "";
                                            switch($data->position) {
                                                case 1:
                                                    $string = "Owner";
                                                    break;
                                                case 2:
                                                    $string = "Purchaser";
                                                    break;
                                                case 3:
                                                    $string = "Estimator";
                                                    break;
                                                case 4:
                                                    $string = "Engineer";
                                                    break;
                                                case 5:
                                                    $string = "Lainnya";
                                                    break;
                                            }
                                            @endphp
                                            <input name="description" type="text" id="description"
                                                 class="form-control form-control-lg "
                                                readonly="" value="{{ $string }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>NPWP</span></h6>
                                            <input name="description" type="text" id="description"
                                                 class="form-control form-control-lg "
                                                readonly="" value="{{ $data->npwp }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>NPWP Photo</span></h6>
                                           
                                            @if(!empty($npwp_photo) && $npwp_photo != null)
                                            <img src="{{$npwp_photo}}" width="300px"></img>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
        </section>

        
    </form>
</x-app-layout>
