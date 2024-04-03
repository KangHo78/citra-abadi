@php
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Enquiry</h3>
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
                        <form action="https://nara.prog/dashboard">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group pb-1 parent">
                                        <h6 class="form-label"><span>Date Start</span></h6>
                                        <div class="input-group mb-1">
                                            <span style="padding-bottom: 16px;" class="input-group-text"><i
                                                    class="bi bi-calendar"></i></span>
                                            <input class="form-control form-control-lg datepicker" placeholder="Date"
                                                tabindex="0" type="text" id="date_start">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group pb-1 parent">
                                        <h6 class="form-label"><span>Date End</span></h6>
                                        <div class="input-group mb-1">
                                            <span style="padding-bottom: 16px;" class="input-group-text"><i
                                                    class="bi bi-calendar"></i></span>
                                            <input class="form-control form-control-lg datepicker" placeholder="Date"
                                                tabindex="0" type="text" id="date_end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group pb-1 parent">
                                        <h6 class="form-label"><span>Kode</span></h6>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-lg " placeholder="Kode"
                                                tabindex="0" type="text" id="code">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group pb-1 parent">
                                        <h6 class="form-label"><span>Customer</span></h6>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-lg " placeholder="Customer"
                                                tabindex="0" type="text" id="customer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="d-flex justifty-content-end align-items-end" style="height: 100%;">
                                        <button class="btn btn-outline-info rounded-pill" type="submit"
                                            style="padding-left:20px;padding-right:20px">
                                            Filter
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

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
                                <th>Status</th>
                                <th>Total</th>
                                <th>Item</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $el)
                                <tr>
                                    <td>{{ $el->code }} </td>
                                    <td>{{ date('d F Y', strtotime($el->date)) }}</td>
                                    <td>{{ $el->customer->name }}</td>
                                    <td>
                                        @if ($el->status == 1)
                                            <span class="badge bg-info">Permintaan Masuk</span>
                                        @elseif ($el->status == 2)
                                            <span class="badge bg-info">Penawaran Terkirim</span>
                                        @elseif ($el->status == 3)
                                            <span class="badge bg-warning">Follow Up</span>
                                        @elseif ($el->status == 4)
                                            <span class="badge bg-success">Cancel</span>
                                        @elseif ($el->status == 5)
                                            <span class="badge bg-danger">Deal</span>
                                        @endif
                                    </td>
                                    <td class="text-end">Rp.{{ number_format($el->grand_total,0,'.',',') }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($el->enquiry_detail as $el1)
                                                <li>{{ $el1->item->name }} ({{ $el1->item_detail->sku }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a href="{{ route('transaction.sales.show', $el->id) }}"
                                                        class="dropdown-item">
                                                        <i class="bi bi-eye text-primary"></i>
                                                        <b class="p-2">Lihat</b>
                                                    </a>
                                                    <a href="{{ route('transaction.sales.edit',  $el->id) }}"
                                                        class="dropdown-item">
                                                        <i class="bi bi-pencil text-warning"></i>
                                                        <b class="p-2">Ubah</b>
                                                    </a>
                                                    @if ($el->status == 1 || $el->status == 2 || $el->status == 3)
                                                        <a href="{{ route('transaction.sales.email', $el->id) }}"
                                                            class="dropdown-item">
                                                            <i class="bi bi-envelope text-warning"></i>
                                                            <b class="p-2">Email</b>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('transaction.sales.print', $el->id) }}"
                                                        class="dropdown-item">
                                                        <i class="bi bi-printer text-primary"></i>
                                                        <b class="p-2">Cetak</b>
                                                    </a>
                                                    <input type="hidden" name="_token"
                                                        value="5hxXelPptFRbbrxW4qS2IFpmhEtzy5g46YNK8piJ">
                                                    <a class="dropdown-item" data-bs-toggle="tooltip"
                                                        title="Delete Data" onclick="destroy('')"
                                                        href="javascript:;">
                                                        <i class="bi bi-trash text-danger"></i>
                                                        <b class="p-2">Hapus</b>
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


    @section('scripts')
        <script></script>
    @endsection
</x-app-layout>
