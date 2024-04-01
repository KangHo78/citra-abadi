<style>
    .dataTables_filter {
display: none;
}
    </style>
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Tambah Item</h4>
                <p class="text-subtitle text-muted">Buat data item dan isi form dibawah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Item</li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored" action="{{route('item.store')}}" method="POST">
        @csrf
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
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>SKU</span></h6>
                                            <input name="sku" type="text" id="sku"
                                                placeholder="SKU"
                                                class="form-control form-control-lg validation required" >

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama</span></h6>
                                            <input name="name" type="text" id="name"
                                                placeholder="Nama"
                                                class="form-control form-control-lg validation required" 
                                                 >

                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Deskripsi</span></h6>
                                            <input name="desc" type="text" id="desc"
                                                placeholder="Description" class="form-control form-control-lg "
                                                 >
                                        </div>
                                    </div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Kategori</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="category_id" id="category_id">
                                        <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::where('parent_category_id', null)->get() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
</div>
<div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Kategori
                                            </button>
</div>

                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Subkategori 1</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="subcategory_1_id" id="subcategory_1_id">
                                        <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::whereNot('parent_category_id', null)->get() as $subcategory_1)
                                        <option value="{{ $subcategory_1->id }}">{{ $subcategory_1->name }}</option>
                                        @endforeach
                                    </select>
                                   
</div>
<div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Subkategori
                                            </button>
</div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Subkategori 2</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="subcategory_2_id" id="subcategory_2_id">
                                    <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::whereNot('parent_category_id', null)->get() as $subcategory_2)
                                        <option value="{{ $subcategory_2->id }}">{{ $subcategory_2->name }}</option>
                                        @endforeach
                                        </select>
</div>
<div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Subkategori
                                            </button>
</div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Subkategori 3</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="subcategory_3_id" id="subcategory_3_id">
                                    <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::whereNot('parent_category_id', null)->get() as $subcategory_3)
                                        <option value="{{ $subcategory_3->id }}">{{ $subcategory_3->name }}</option>
                                        @endforeach
                                        </select>
</div>
<div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Subkategori
                                            </button>
</div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Subkategori 4</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="subcategory_4_id" id="subcategory_4_id">
                                    <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::whereNot('parent_category_id', null)->get() as $subcategory_4)
                                        <option value="{{ $subcategory_4->id }}">{{ $subcategory_4->name }}</option>
                                        @endforeach
                                        </select>
</div>
<div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Subkategori
                                            </button>
</div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Subkategori 5</span></h6>
                                    <div class="row">
                                    <div class="col-12">
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="subcategory_5_id" id="subcategory_5_id">
                                    <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::whereNot('parent_category_id', null)->get() as $subcategory_5)
                                        <option value="{{ $subcategory_5->id }}">{{ $subcategory_5->name }}</option>
                                        @endforeach
                                        </select>
</div>
<div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Subkategori
                                            </button>
</div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Subkategori 6</span></h6>
                                    <div class="row">
                                    <div class="col-12">
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="subcategory_6_id" id="subcategory_6_id">
                                    <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::whereNot('parent_category_id', null)->get() as $subcategory_6)
                                        <option value="{{ $subcategory_6->id }}">{{ $subcategory_6->name }}</option>
                                        @endforeach
                                        </select>
                                        <div class="col-6">
                                        <button type="button" class="btn btn-primary "
                                                >
                                                Tambah Subkategori
                                            </button>
</div>
                                
                               
                               
                              
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Merek</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="brand_id" id="brand_id">
                                    <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Brand::all() as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                        </select>

                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Foto Produk</span></h6>

                                           
                                            <button type="button" class="btn btn-primary btn-xl"
                                                >
                                                Tambah Foto
                                            </button>
                                            
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
                        <div class="col-sm-6 col-lg-4">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6 text-start">
                                    <h4 class="card-title ">Data Detail</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-8">
                            <button class="btn btn-outline-info rounded-pill float-end pr-2" type="button"
                                onclick="addNew()">
                                Tambah data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dropHere">
                    <table class="table" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Material</th>
                                <th>Spec</th>
                                <th>Class</th>
                                <th>Conn</th>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           

                        </tbody>
                    </table>
                    </div>
                </div>
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
@section('script')
<script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
      paging: false, 
      info: false,

      //add these config to remove empty header
      "bJQueryUI": true,
      "sDom": 'lfrtip'
   
});
});
                 </script>
@endsection
