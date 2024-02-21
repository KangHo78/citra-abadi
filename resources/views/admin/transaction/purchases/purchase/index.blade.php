<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Transaksi Penjualan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
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
                                        <label class="col-form-label" for="first-name">Code</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="first-name" class="form-control" name="fname"
                                            placeholder="First Name">
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
                                            placeholder="Last Name">
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
                    <div class="col-sm-3 col-3">
                        <h4 class="card-title ">Data</h4>
                    </div>
                    <div class="col-sm-9 col-9">
                        <div class="buttons">
                            <a href="{{ route('transaction.sales.create') }}"
                                class="btn btn-outline-info rounded-pill float-end">Buat data baru</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive dataTable">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Item</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 30; $i++)
                                
                            <tr>
                                <td>SLE202939{{$i}}</td>
                                <td>{{date('d F Y')}}</td>
                                <td>
                                    <ul style="list-style-type: none;padding-inline-start: 0">
                                        <li>Asep Hidayat</li>
                                        <li>0834897192</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul style="list-style-type: none;padding-inline-start: 0">
                                        <li>Plafon</li>
                                        <li>Plafon</li>
                                        <li>Plafon</li>
                                    </ul>
                                </td>
                                <td>Rp. {{number_format(10000*$i)}}</td>
                                <td>
                                    <span class="badge bg-success">Terbayar</span>
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
