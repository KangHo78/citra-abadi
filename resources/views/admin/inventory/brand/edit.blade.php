<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Ubah Merek</h4>
                <p class="text-subtitle text-muted">Buat data item dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Merek</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored" action="{{ route('brand.update', $data->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $data->id }}">
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
                                    
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama</span></h6>
                                            <input name="name" type="text" id="name"
                                                placeholder="Nama"
                                                class="form-control form-control-lg validation required" value="{{ $data->name }}">

                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <!-- <div class="row">
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
                                            <h6 class="form-label"><span>Foto Produk</span></h6>
                                            <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png" width="100px"></img>
                                            <br>
                                            <button type="button" class="btn btn-primary btn-xl"
                                                >
                                                Tambah Foto
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
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
                            <input class="btn btn-outline-success rounded-pill float-end buttonSave" 
                                type="submit">
                                Simpan Data
</input>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-app-layout>
