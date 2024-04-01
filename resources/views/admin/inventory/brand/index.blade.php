<x-app-layout>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Merek</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Merek</li>
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
                                        <label class="col-form-label" for="last-name">Nama Merek</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <form action="" method="GET">
                                            @if (isset($name))
                                        <input type="text" id="brand_filter" class="form-control" name="name"
                                            placeholder="Name" value="{{ $name }}">
                                            @else
                                            <input type="text" id="brand_filter" class="form-control" name="name"
                                            placeholder="Name" value="">
                                            @endif
                                        </form>
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
                            <a href="{{ route('brand.create') }}"
                                class="btn btn-outline-info rounded-pill float-end">Buat data baru</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="brandDataTable">
            @include('admin.inventory.brand.datatable')
            </div>
            </div>
        </div>
    </section>
@section('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
            });
           
            // 
            // $('#customer_id').select2({
            //     ajax({
                    
            //         url: '{{route('customer.search')}}',
            //         type: 'POST',
            //         data: {
            //             keyword: keyword_input,
            //             page: false
            //         },
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //        processResults: function(data) {
            //         return {
            //             results: data
            //         }
            //        }
            //     });
                
            // });
            </script>
    @endsection
    </x-app-layout>