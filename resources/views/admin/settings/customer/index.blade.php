
<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Enquirer</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
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
                    <form action="{{ route('customer.index') }}" method="GET">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">Kode</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="code" class="form-control" name="code"
                                            placeholder="Kode Customer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="last-name">Nama</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Nama">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</form>
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
                            <a href="{{ route('customer.create') }}"
                                class="btn btn-outline-info rounded-pill float-end">Buat data baru</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive dataTable">
                    <table class="table" id="dataTable" style="overflow:scroll; white-space: nowrap;" width="150%">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <!-- <th>Alamat NPWP</th> -->
                                <th>Kota / Provinsi / Kode Pos</th>
                                <th>Telepon / WA</th>
                                <th>Nama PIC</th>
                                <th>Email</th>
                                <th>Total Enquiry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $customer)
                                
                            <tr>
                                <td>{{ $customer->code }}</td>
                                <td>{{ $customer->company_name }}</td>
                                <td>{{ $customer->address }}</td>
                                <!-- <td>Jl. Test No. 1</td> -->
                                <td>{{ $customer->address_2 }}</td>
                                <td>
                                {{ $customer->phone }}
                                </td>
                                <td>{{ $customer->name }}</td>
                                <td>
                                {{ $customer->email }}
                                </td>
                                @if(!empty($customer->enquiry))
                                <td>{{ $customer->enquiry->count() }}</td>
                                @else
                                <td>{{ 0 }}</td>
                                @endif
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a href="{{route('customer.show',$customer->id)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <b class="p-2">Lihat</b>
                                                </a>
                                                <a href="{{route('customer.edit',$customer->id)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-pencil text-warning"></i>
                                                    <b class="p-2">Ubah</b>
                                                </a>
                                               
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
