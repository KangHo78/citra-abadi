<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Item</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Stok</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section id="horizontal-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filter Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">SKU</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="first-name" class="form-control" name="fname"
                                            placeholder="SKU">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="last-name">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="last-name" class="form-control" name="fname"
                                            placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">Kategori</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Kategori A</option>
                                                <option value="Cash">Kategori B</option>
                                                <option value="Cash">Kategori C</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="last-name">Merek</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Merek A</option>
                                                <option value="Cash">Merek B</option>
                                                <option value="Cash">Merek C</option>
                                            </select>
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
                    <div class="col-sm-3 col-3">
                        <h4 class="card-title ">Data</h4>
                    </div>
                   
                    <div class="col-sm-9 col-9">
                    <div class="buttons">
                          
                          <a href="{{ route('item.create') }}"
                              class="btn btn-outline-info rounded-pill float-end">Buat data baru</a>
                      </div>
                    <div class="buttons">
                            <a href=""
                                class="btn btn-outline-info rounded-pill float-end">Import Item</a>
                        </div>
                    <div class="buttons">
                            <a href=""
                                class="btn btn-outline-info rounded-pill float-end">Export Item</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive dataTable" >
                    <table class="table" id="dataTable" style="overflow:scroll; " width="225%">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Nama</th>
                                <th>Merek</th>
                                <th>Kategori</th>
                                <th>Subkategori 1</th>
                                <th>Subkategori 2</th>
                                <th>Subkategori 3</th>
                                <th>Material</th>
                                <th>Finishing</th>
                                <th>Diameter</th>
                                <th>Qty / Pkt</th>
                                <th>Deskripsi</th>
                                <th>Harga Jual</th>
                                <th>Harga Diskon</th>
                                <th>Foto Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 30; $i++)
                                
                            <tr>
                                <td>SLE202939{{$i}}</td>
                                <td>Item {{$i}}</td>
                                <td>Merek A</td>
                                <td>Kategori A</td>
                                <td>Subkategori A</td>
                                <td>Subkategori A</td>
                                <td>Subkategori A</td>
                                <td>Material A</td>
                                <td>Finishing A</td>
                                <td>Diameter A</td>
                                <td>100</td>
                                <td>
                                    <ul style="list-style-type: none;padding-inline-start: 0">
                                        <li>Deskripsi</li>
                                        <li>Deskripsi</li>
                                    </ul>
                                </td>
                               
                                <td>Rp. {{number_format(20000*$i+2)}}</td>
                                <td>Rp. {{number_format(15000*$i+2)}}</td>
                                <td>
                                    <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png" width="100px"></img>
                                </td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a href="index.html"
                                                    class="dropdown-item">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <b class="p-2">Lihat</b>
                                                </a>
                                                <a href="{{route('item.edit',$i)}}"
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
                            @endfor

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
