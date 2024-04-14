<x-app-layout>
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Item Detail Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="importForm" action="{{ route('item_detail.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="importFile" class="form-label">Import File</label>
                <input class="form-control" type="file" id="file" name="file" required>
                <div class="form-text">Supported file formats: CSV, XLSX</div>
            </div>
            </form>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="importForm" class="btn btn-primary">Import</button>
        </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="importItemModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Item Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="importItemForm" action="{{ route('items.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="importFile" class="form-label">Import File</label>
                <input class="form-control" type="file" id="file" name="file" required>
                <div class="form-text">Supported file formats: CSV, XLSX</div>
            </div>
            </form>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" form="importItemForm" class="btn btn-primary">Import</button>
        </div>
        </div>
    </div>
    </div>
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Item</h3>
                 @if (session()->get('errorMsg'))
                    <p class="text-subtitle text-danger"> {{ session()->get('errorMsg') }} </p>
                @endif
                @if (session()->get('successMsg'))
                    <p class="text-subtitle text-success"> {{ session()->get('successMsg') }} </p>
                @endif
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
    <form action="" method="GET">
       
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
                                    <div class="col-xl-10 col-lg-4 col-6">
                                        <input type="text" id="sku" class="form-control" name="sku"
                                            placeholder="SKU" value="{{ $sku }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="last-name">Name</label>
                                    </div>
                                    <div class="col-xl-10 col-lg-4 col-6">
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Name" value="{{ $name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="category_id">Kategori</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="category_id" id="category_id">
                                                @if($category_id == 0)
                                                <option value="" selected="">- Select -</option>
                                                @else
                                                <option value="">- Select -</option>
                                                @endif
                                                @php
                                                $categories = \App\Models\Category::all()->take(5);
                                                @endphp
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="last-name">Merek</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="brand" id="brand">
                                        
                                                @if($brand == 0)
                                                <option value="" selected="">- Select -</option>
                                                @else
                                                <option value="">- Select -</option>
                                                @endif
                                                @php
                                                $brands = \App\Models\Brand::all()->take(5);
                                                @endphp
                                                @foreach($brands as $brand_row)
                                                <option value="{{ $brand_row->id }}">{{ $brand_row->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                
                            </div>
                            
                           
                          
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-3 col-3">
                        <h4 class="card-title ">Data</h4>
                    </div>
                   
                    <div class="col-sm-9 col-9">
                        @can('item-create')
                    <div class="buttons">
                          
                          <a href="{{ route('item.create') }}"
                              class="btn btn-outline-info rounded-pill float-end">Buat data baru</a>
                      </div>
                      @endcan
                    <div class="buttons">
                    <button type="button" class="btn btn-outline-info rounded-pill float-end" data-bs-toggle="modal" data-bs-target="#importItemModal">
                            Import Item
                        </button>
                        </div>
                        <div class="buttons">
                        <button type="button" class="btn btn-outline-info rounded-pill float-end" data-bs-toggle="modal" data-bs-target="#importModal">
                            Import Item Detail
                        </button>
                           
                        </div>
                    <div class="buttons">
                            <a href="{{ route('items.export') }}"
                                class="btn btn-outline-info rounded-pill float-end">Export Item</a>
                        </div>
                        
                    <div class="buttons">
                            <a href="{{ route('item_detail.export') }}"
                                class="btn btn-outline-info rounded-pill float-end">Export Item Detail</a>
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
                                <th>Deskripsi</th>
                                <th>Foto Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                
                            <tr>
                                <td>{{$item->sku}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->brand->name}}</td>
                                <td>{{$item->category->name}}</td>
                                @if(isset($item->description) && !empty($item->description))
                                <td>{{strip_tags($item->description)}}</td>
                                @else
                                <td></td>
                                @endif
    
                                <td></td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                <a href="{{route('item.show',$item->id)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <b class="p-2">Lihat</b>
                                                </a>
                                                @can('item-update')
                                                <a href="{{route('item.edit',$item->id)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-pencil text-warning"></i>
                                                    <b class="p-2">Ubah</b>
                                                </a>
                                                @endcan
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
        <script type="text/javascript">
            var sku = "";
            var name = "";
            var category_id = '';
            var brand = '';
            var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)',
            },      
            order: [[1, 'desc']],
            ajax: {
                url: "{{ route('item.index') }}",
                data: function(data){
                    data.sku = sku;
                    data.name = name;
                    data.category_id = category_id;
                    data.brand = brand;
                    data.dataTable = true;
                }
            },
            columns: [
                {data: 'sku', name: 'sku'},
                {data: 'name',name: 'name'},
                {data: 'brand', name: 'brand'},
                {data: 'category_id', name: 'category_id'},
                {data: 'description', name: 'description'},
                {data: 'photos', name: 'photos'},
                {data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            
        });
            $(document).ready(function(){
                table.draw();
                $('#sku').on('change', function() {
                    sku = $(this).val();
                    table.draw();
                })
                $('#name').on('change', function() {
                    name = $(this).val();
                    table.draw();
                })
                $('#category_id').on('change', function() {
                    category_id = $(this).val();
                    table.draw();
                })
               
                $('#brand').on('change', function() {
                    brand = $(this).val();
                    table.draw();
                })
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
