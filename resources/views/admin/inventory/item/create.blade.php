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
                @if (isset($errors) && $errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-subtitle text-danger">*{{ $error }}</p>
                    @endforeach
                @endif
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


    <form id="stored" action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
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
                    
                                            <textarea name="description" type="text" id="description"
                                                placeholder="Description" class="form-control form-control-lg "
                                                 >
</textarea>
                                        </div>
                                    </div>
                                <div class="form-group pb-1 parent">
                                    <h6 class="form-label"><span>Kategori</span></h6>
                                    <select class="select2 form-select form-control-lg validation required"
                                        name="category_id" id="category_id">
                                        <option value="0" selected="">- Select -</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
            <input type="file" name="photos[]" id="photos" multiple hidden>
            <button type="button" class="btn btn-primary btn-xl" id="addPhotos">
                Tambah Foto
            </button>
            <div class="row" id="previewPhotos"></div>
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
                                >
                                Tambah data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dropHere">
                    <table class="table" id="dataTable2" width="100%" style="scroll: overflow; table-layout: initial; word-wrap: break-word; overflow-x: scroll; display:block;">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Material</th>
                                <th>Spec</th>
                                <th>Class</th>
                                <th>Conn</th>
                                <th>Size</th>
                                <th>Price</th>
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
                            <button class="btn btn-outline-success rounded-pill float-end buttonSave" type="submit">
                                Simpan Data
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        
    </form>

    @section('scripts')
    @php
        $materials = \App\Models\Material::pluck('name');
        $spec = \App\Models\Spec::pluck('name');
        $class = \App\Models\Classes::pluck('name');
        $conn = \App\Models\Conn::pluck('name');
        $size = \App\Models\Size::pluck('name');
    @endphp
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
            type="text/css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
        </script>
        <script type="text/javascript">
    function addNew() {
  // Create a new table row element
  var newRow = $('<tr style="overflow-y: scroll; overflow-x: scroll;">');

  // Add cells for SKU, Material (dropdown), Spec, Class (dropdown), Conn, Size, and Action
  newRow.append('<td width="5%"><input type="text" name="item_details[][sku]" width="5px"></td>');

  // Material dropdown (assuming you have an array of material options)
  const materialOptions = {!! json_encode($materials) !!};
  const materialSelect = document.createElement('select');
  materialSelect.name = 'item_details[][material]';
  materialOptions.forEach(option => {
    const optionElement = document.createElement('option');
    optionElement.value = option;
    optionElement.textContent = option;
    materialSelect.appendChild(optionElement);
  });
  newRow.append($('<td width="10%">').append(materialSelect));

  const specOptions = {!! json_encode($spec) !!};
  const specSelect = document.createElement('select');
  specSelect.name = 'item_details[][spec]';
  specOptions.forEach(option => {
    const optionElement = document.createElement('option');
    optionElement.value = option;
    optionElement.textContent = option;
    specSelect.appendChild(optionElement);
  });
  newRow.append($('<td width="5%">').append(specSelect));

  // Class dropdown (assuming you have an array of class options)
  const classOptions = {!! json_encode($class) !!};
  const classSelect = document.createElement('select');
  classSelect.name = 'item_details[][class]';
  classOptions.forEach(option => {
    const optionElement = document.createElement('option');
    optionElement.value = option;
    optionElement.textContent = option;
    classSelect.appendChild(optionElement);
  });
  newRow.append($('<td width="5%">').append(classSelect));

  const connOptions = {!! json_encode($conn) !!};
  const connSelect = document.createElement('select');
  connSelect.name = 'item_details[][conn]';
  connOptions.forEach(option => {
    const optionElement = document.createElement('option');
    optionElement.value = option;
    optionElement.textContent = option;
    connSelect.appendChild(optionElement);
  });
  newRow.append($('<td width="5%">').append(connSelect));
  const sizeOptions = {!! json_encode($size) !!};
  const sizeSelect = document.createElement('select');
  sizeSelect.name = 'item_details[][size]';
  sizeOptions.forEach(option => {
    const optionElement = document.createElement('option');
    optionElement.value = option;
    optionElement.textContent = option;
    sizeSelect.appendChild(optionElement);
  });
  newRow.append($('<td width="5%">').append(sizeSelect));
  newRow.append('<td width="5%"><input type="text" name="item_details[][price]" width="5px"></td>');
  newRow.append('<td width="5%"><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td>');

  // Append the new row to the table body
  $('#dataTable2 tbody').append(newRow);
}

    $(document).ready(function() {
        var editor = new FroalaEditor('#description' , {
  // Other configuration options
  toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'insertLink']
});
        // $('#description').FroalaEditor({
        // // Optional configuration options for Froala editor
        // });
        const previewPhotos = document.getElementById('previewPhotos');

        var existingFiles = Array.from($('#photos')[0].files);

        var existingFileData = null;

        var allFiles = null;
       
        $('#addPhotos').click(function(event) {
            
            event.preventDefault(); // Prevent default button action (if any)

            // Store existing file data before triggering the file input
            existingFileData = existingFiles.map(file => URL.createObjectURL(file));
            console.log(existingFileData);

            $('#photos').trigger('click');
        });

        $('#photos').change(function(e) {
        const files = e.target.files;
        // If there are existing file data, create previews for them
        // if (existingFileData) {
        //         existingFileData.forEach(dataURL => {
        //             const previewImage = createPreviewImage(dataURL); // Adjust as needed
        //             previewPhotos.appendChild(previewImage);
        //         });
        //     }
  console.log(document.getElementById('photos').value);

  for (const file of files) {
    const reader = new FileReader();

    // // Check if the file is an image
    // if (!file.type.match('image.*')) {
    //   alert("Please select only image files.");
    //   return;
    // }

    // // Check file size (optional)
    // if (file.size > 1024 * 1024 * 2) { // 2MB limit (adjust as needed)
    //   alert("File size exceeds the limit of 2MB.");
    //   return;
    // }

    reader.readAsDataURL(file); // Read file content as data URL

    reader.onload = function(event) {
      const previewImage = document.createElement('div');
      previewImage.classList.add('preview-image');

      const img = document.createElement('img');
      img.src = event.target.result;
      img.classList.add('img-thumbnail', 'mr-2');
      img.width = 200; // Add styling for previews
      previewImage.appendChild(img);

      

      previewPhotos.appendChild(previewImage);

      // Attach click event listener to the remove button
      removeButton.addEventListener('click', removePreviewImage);
    };

    reader.onerror = function(error) {
      console.error("Error reading file:", error);
      alert("An error occurred while previewing the image.");
    };
  }
    // ... after processing newly selected files
    allFiles = existingFiles.concat(Array.from(e.target.files));
    existingFiles = allFiles; // Update the existingFiles array
});

$('#stored').submit(function() {
    console.log(allFiles);
    const formData = new FormData(this);
    if(allFiles != null) {
    // allFiles.forEach(file => formData.append('photos[]', file));
    const fileInput = document.getElementById('photos');
    fileInput.files = new Blob([new Blob(newFiles)], { type: 'application/octet-stream' });
    console.log('allFile');
    }
    console.log(formData);
    $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('test');
                // Handle successful submission (e.g., redirect, display success message)
            },
            error: function(error) {
                // Handle errors during submission
            }
        });

    // Submit the form with the combined files
    // ...
});

function removePreviewImage(e) {
  // Get the parent element of the button (which is the preview-image div)
  const previewImage = e.target.parentElement;
  // Remove the preview-image element from the previewPhotos container
  previewPhotos.removeChild(previewImage);
}
        // Event listener for "Tambah data" button
        $('.btn-outline-info.rounded-pill').click(function() {
            console.log('check');
            addNew();

        }, );

        // Event listener for "Hapus" button (remove row)
        $(document).on('click', '.removeRow', function() {
            $(this).parent().parent().remove();
        });

       
        
});
                 </script>
@endsection
</x-app-layout>

