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
                                                $categories = \App\Models\Category::where('parent_category_id', null)->get()->take(5);
                                                @endphp
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="subcategory_id_2">Subkategori 2</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="subcategory_id_2" id="subcategory_id_2">
                                                @if($subcategory_id_2 == 0)
                                                <option value="" selected="">- Select -</option>
                                                @else
                                                <option value="">- Select -</option>
                                                @endif
                                                @php
                                                $categories = \App\Models\Category::whereNotNull('parent_category_id')->take(5);
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
                                        <label class="col-form-label" for="first-name">Subkategori 1</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="subcategory" id="subcategory">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Subkategori A</option>
                                                <option value="Cash">Subkategori B</option>
                                                <option value="Cash">Subkategori C</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">Subkategori 3</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="subcategory_3" id="subcategory_3">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Subkategori A</option>
                                                <option value="Cash">Subkategori B</option>
                                                <option value="Cash">Subkategori C</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">Subkategori 4</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="subcategory_4" id="subcategory_4">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Subkategori A</option>
                                                <option value="Cash">Subkategori B</option>
                                                <option value="Cash">Subkategori C</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">Subkategori 6</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="subcategory_6" id="subcategory_6">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Subkategori A</option>
                                                <option value="Cash">Subkategori B</option>
                                                <option value="Cash">Subkategori C</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label" for="first-name">Subkategori 5</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-4 col-6">
                                    <select class="select2 form-select form-control-lg validation required"
                                                name="subcategory_5" id="subcategory_5">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Subkategori A</option>
                                                <option value="Cash">Subkategori B</option>
                                                <option value="Cash">Subkategori C</option>
                                            </select>
                                    </div>
                                </div>
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
                                <th>Subkategori 4</th>
                                <th>Subkategori 5</th>
                                <th>Subkategori 6</th>
                                <th>Material</th>
                                <th>Spec</th>
                                <th>Class</th>
                                <th>Conn</th>
                                <th>Size</th>
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
                                @if(isset($item->subcategory_id_1) && !empty($item->subcategory_id_1))
                                <td>{{$item->subcategory_1->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->subcategory_id_2) && !empty($item->subcategory_id_2))
                                <td>{{$item->subcategory_2->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->subcategory_id_3) && !empty($item->subcategory_id_3))
                                <td>{{$item->subcategory_3->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->subcategory_id_4) && !empty($item->subcategory_id_4))
                                <td>{{$item->subcategory_4->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->subcategory_id_5) && !empty($item->subcategory_id_5))
                                <td>{{$item->subcategory_5->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->subcategory_id_6) && !empty($item->subcategory_id_6))
                                <td>{{$item->subcategory_6->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->item_detail->material_id) && !empty($item->item_detail->material_id))
                                <td>{{$item->item_detail->material->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->item_detail->spec_id) && !empty($item->item_detail->spec_id))
                                <td>{{$item->item_detail->spec->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->item_detail->class_id) && !empty($item->item_detail->class_id))
                                <td>{{$item->item_detail->class->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->item_detail->conn_id) && !empty($item->item_detail->conn_id))
                                <td>{{$item->item_detail->conn->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->item_detail->size_id) && !empty($item->item_detail->size_id))
                                <td>{{$item->item_detail->size->name}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->description) && !empty($item->description))
                                <td>{{$item->description}}</td>
                                @else
                                <td></td>
                                @endif
                                @if(isset($item->photos) && !empty($item->photos))
                                <td> <img src="{{ json_decode($item->photos, true)[0] }}" width="100px"></img></td>
                                @else
                                <td></td>
                                @endif
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
                                                <a href="{{route('item.edit',$item->id)}}"
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
@section('scripts')
        <script type="text/javascript">
            var sku = "";
            var name = "";
            var category_id = '';
            var subcategory_id_1= '';
            var subcategory_id_2= '';
            var subcategory_id_3= '';
            var subcategory_id_4= '';
            var subcategory_id_5= '';
            var subcategory_id_6= '';
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
                    data.subcategory_id_1= subcategory_id_1;
                    data.subcategory_id_2= subcategory_id_2;
                    data.subcategory_id_3= subcategory_id_3;
                    data.subcategory_id_4= subcategory_id_4;
                    data.subcategory_id_5= subcategory_id_5;
                    data.subcategory_id_6= subcategory_id_6;
                    data.brand = brand;
                    data.dataTable = true;
                }
            },
            columns: [
                {data: 'sku', name: 'sku'},
                {data: 'name',name: 'name'},
                {data: 'brand', name: 'brand'},
                {data: 'category_id', name: 'category_id'},
                {data: 'subcategory_id_1', name: 'subcategory_id_1'},
                {data: 'subcategory_id_2', name: 'subcategory_id_2'},
                {data: 'subcategory_id_3', name: 'subcategory_id_3'},
                {data: 'subcategory_id_4', name: 'subcategory_id_4'},
                {data: 'subcategory_id_5', name: 'subcategory_id_5'},
                {data: 'subcategory_id_6', name: 'subcategory_id_6'},
                {data: 'material', name: 'material'},
                {data: 'spec', name: 'spec'},
                {data: 'class', name: 'class'},
                {data: 'conn', name: 'conn'},
                {data: 'size', name: 'size'},
                {data: 'desc', name: 'desc'},
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
                $('#subcategory_id_1').on('change', function() {
                    subcategory_id_1 = $(this).val();
                    table.draw();
                })
                $('#subcategory_id_2').on('change', function() {
                    subcategory_id_1 = $(this).val();
                    table.draw();
                })
                $('#subcategory_id_3').on('change', function() {
                    subcategory_id_1 = $(this).val();
                    table.draw();
                })
                $('#subcategory_id_4').on('change', function() {
                    subcategory_id_1 = $(this).val();
                    table.draw();
                })
                $('#subcategory_id_5').on('change', function() {
                    subcategory_id_1 = $(this).val();
                    table.draw();
                })
                $('#subcategory_id_6').on('change', function() {
                    subcategory_id_1 = $(this).val();
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
