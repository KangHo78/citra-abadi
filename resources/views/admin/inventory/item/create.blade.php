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


    <form id="stored">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-sm-12 col-lg-8 col-md-12">


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
                                                class="form-control form-control-lg validation required" value="">

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nama</span></h6>
                                            <input name="code" type="text" id="code"
                                                placeholder="Nama"
                                                class="form-control form-control-lg validation required" value="">

                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Deskripsi</span></h6>
                                            <input name="description" type="text" id="description"
                                                placeholder="Description" class="form-control form-control-lg "
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Kategori</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Kategori A</option>
                                                <option value="Cash">Kategori B</option>
                                                <option value="Cash">Kategori C</option>
                                            </select>

                                        </div>
                                        <div class="form-group pb-1 parent">
                                            <h6 class="form-label"><span>Merek</span></h6>
                                            <select class="select2 form-select form-control-lg validation required"
                                                name="customer_id" id="customer_id">
                                                <option value="" selected="">- Select -</option>
                                                <option value="Cash">Merek A</option>
                                                <option value="Cash">Merek B</option>
                                                <option value="Cash">Merek C</option>
                                            </select>

                                        </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Foto Produk</span></h6>
                                            <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png" width="100px"></img>
                                            <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png" width="100px"></img>
                                            <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png" width="100px"></img>
                                            <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png" width="100px"></img>
                                            <br>
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
                <div class="col-sm-12 col-lg-4 col-md-12">
                <div class="card ">
                        <br>
                                    <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                    <h6>HPP</h6>
                                        <input name="price" type="text" id="price" placeholder=""
                                            class="form-control form-control-lg " value="" 
                                            >
                                    </div>
                                </div>
                                    </div>
                                    </div>
                    <div class="card ">
                       
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                    <h6>Harga Jual</h6>

                                        <input name="price" type="text" id="price" placeholder=""
                                            class="form-control form-control-lg " value="" 
                                            >
                                    </div>
                                </div>

                                <div class="col-12 pb-3">
                                    <h6>Tipe Diskon</h6>
                                    <div class="btn-group pb-3 col-12" role="group"
                                        aria-label="Basic radio toggle button group">

                                        <input type="radio" class="btn-check" name="discount_type"
                                            id="dis_percentage" autocomplete="off" value="%">
                                        <label class="btn btn-outline-primary" for="dis_percentage">
                                            Persen (%)</label>

                                        <input type="radio" class="btn-check" name="discount_type" id="dis_non"
                                            autocomplete="off" checked="" value="NON">
                                        <label class="btn btn-outline-primary" for="dis_non"> NON</label>

                                        <input type="radio" class="btn-check" name="discount_type" id="dis_value"
                                            autocomplete="off" value="$">
                                        <label class="btn btn-outline-primary" for="dis_value"> Nilai
                                            ($)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Persen (%)</span></h6>
                                            <input name="discount_percentage" type="text" id="discount_percentage"
                                                placeholder="Persen (%)"
                                                class="form-control form-control-lg text-end numberFormat"
                                                value="0" onkeyup="calcSubTotal()">


                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Nilai (Rp)</span></h6>
                                            <input name="discount_value" type="text" id="discount_value"
                                                placeholder="Nilai (Rp)"
                                                class="form-control form-control-lg text-end numberFormat"
                                                value="0" onkeyup="calcSubTotal()">


                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group parent" style="">
                                        <h6 class="form-label"><span>Total Harga</span></h6>
                                        <input name="total_price" type="text" id="total_price" placeholder="0"
                                            class="form-control form-control-lg text-e nd numberFormat" value="0"
                                            readonly="" style="background-color:#eeeeee">

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
                           
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dropHere">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Warehouse</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                
                            <tr>
                                <td> Warehouse A</td>
                                <td><input type="text" class="form-control form-control-lg "></input></td>
                                
                            </tr>
                            @endfor

                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="button"
                                onclick="save()">
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
