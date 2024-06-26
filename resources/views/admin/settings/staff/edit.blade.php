<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Ubah Staf</h4>
                <p class="text-subtitle text-muted">Buat staf dan isi form dibawah.</p>
                @if (isset($error))
                    <p class="text-subtitle text-danger">*{{ $error }}</p>
                @endif
                @if (isset($errors) && $errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-subtitle text-danger">*{{ $error }}</p>
                    @endforeach
                @endif
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


    <form id="stored" action="{{ route('staff.update', $data->id) }}" method="POST">
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
                                            <h6 class="form-label"><span>Nama</span></h6>
                                            <input name="name" type="text" id="name"
                                                placeholder="Nama"
                                                class="form-control form-control-lg validation required" value="{{ $data->name }}"
                                                >

                                        </div>
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Email</span></h6>
                                            <input name="email" type="text" id="email"
                                                placeholder="Email"
                                                class="form-control form-control-lg validation required" value="{{ $data->email }}"
                                                >

                                        </div>
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Password</span></h6>
                                            <input name="password" type="password" id="password"
                                                placeholder="Password"
                                                class="form-control form-control-lg validation required" value=""
                                                >

                                        </div>
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Konfirmasi Password</span></h6>
                                            <input name="confirm_password" type="password" id="confirm_password"
                                                placeholder="Konfirmasi Password"
                                                class="form-control form-control-lg validation required" value=""
                                                >

                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Hak Akses</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="role_id" id="role_id">
                                                @foreach($roles as $role)
                                                @if($current_role_id == $role->id)
                                                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                                    @else
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach>
                                            </select>

                                        </div>
                                    </div>
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
