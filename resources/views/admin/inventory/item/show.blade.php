<style>
    .dataTables_filter {
display: none;
}
    </style>
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Lihat Item</h4>
                <p class="text-subtitle text-muted">Lihat data item.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Item</li>
                        <li class="breadcrumb-item active" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <form id="stored">
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
                                            <input name="code" type="text" id="code"
                                                placeholder="SKU"
                                                class="form-control form-control-lg validation required" value="{{ $data->sku }}" readonly="">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Nama"
                                                class="form-control form-control-lg validation required" value="{{ $data->name }}" readonly="">

                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Deskripsi</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Description" class="form-control form-control-lg "
                                                value="{{ $data->desc }}" readonly="">
                                        </div>
                                    </div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Kategori</span></h6>
                                    <input name="description" type="text" id="description"
                                                placeholder="Category" class="form-control form-control-lg "
                                                value="{{ $data->category->name }}" readonly="">
</div>

                                
                               
                               
                              
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Merek</span></h6>
                                    <input name="description" type="text" id="description"
                                                placeholder="Brand" class="form-control form-control-lg "
                                                value="{{ $data->brand->name }}" readonly="">

                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            @if(!empty($data->photos))
                                            <h6 class="form-label"><span>Foto Produk</span></h6>

                                           
                                            @foreach($photos as $photo)
                                                <img src="{{ $photo }}" width="300px"></img>
                                            @endforeach
                                            @endif
                                            <br>
                                            
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
            <table class="table" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Material</th>
                                <th>Spec</th>
                                <th>Class</th>
                                <th>Conn</th>
                                <th>Size</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->item_detail as $id)
                                
                            <tr>
                                <td>{{$id->sku}}</td>
                                <td>{{$id->material->name}}</td>
                                <td>{{$id->spec->name}}</td>
                                <td>{{$id->classes->name}}</td>
                                <td>{{$id->conn->name}}</td>
                                <td>{{$id->size->name}}</td>
                                <td>Rp. {{number_format($id->price, 0, '.', ',')}}</td>
                               
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
               
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
