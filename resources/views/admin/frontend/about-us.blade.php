<x-app-layout>
    @section('styles')
        <!-- Include Froala Editor stylesheets -->
        <!-- Include Froala Editor script -->
    @endsection
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>About Us</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Front End</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <form id="aboutUsForm" method="POST" action="#" enctype="multipart/form-data">
        @csrf

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-3 col-3">
                    </div>

                </div>
            </div>
            <div class="card-body">
              
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 pb-2">
                            <div class="form-group parent" style="">
                                <h6 class="form-label"><span>Header</span></h6>
                                <input type="text" class="form-control header" name="header"
                                    value="{{ aboutUs()->header }}">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 pb-2">
                            <div class="form-group parent" style="">
                                <h6 class="form-label"><span>Gambar 1</span></h6>
                                <input type="file" class="form-control image1" name="image1">
                                <br>
                                <img src="{{ asset(aboutUs()->image1) }}" alt="" width="100%">
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 pb-2">
                            <div class="form-group parent" style="">
                                <h6 class="form-label"><span>Gambar 2</span></h6>
                                <input type="file" class="form-control image2" name="image2">
                                <br>
                                <img src="{{ asset(aboutUs()->image2) }}" alt="" width="100%">
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-12 pb-2">
                            <div class="form-group parent" style="">
                                <h6 class="form-label"><span>Body</span></h6>
                                <div id="myEditor">{!! aboutUs()->body !!}</div>
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
                    </div>

                </div>
            </div>
            <div class="card-body">
              
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 pb-2">
                            <div class="form-group parent" style="">
                                <h6 class="form-label"><span>Header Homepage</span></h6>
                                <input type="text" class="form-control header_homepage" name="header_homepage"
                                    value="{{ aboutUs()->header_homepage }}">
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-12 pb-2">
                            <div class="form-group parent" style="">
                                <h6 class="form-label"><span>Body Homepage</span></h6>
                                <input type="text" class="form-control body_homepage" name="body_homepage"
                                value="{{ aboutUs()->body_homepage }}">
                            </div>
                        </div>
                    </div>

                   
            </div>
        </div>
    </section>


    <button id="saveButton" class="btn btn-primary" type="button">Save</button>

</form>



    @section('scripts')
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
            type="text/css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
        </script>
        <script>
            $(document).ready(function() {
                var editor = new FroalaEditor('#myEditor');

                $('#saveButton').click(function() {
                    var content = editor.html.get();
                    saveContent(content);
                });

                function saveContent(content) {

                    var formData = new FormData($('#aboutUsForm')[0]);
                    var header = $('.header').val();

                    var additionalContent = editor.html.get(); // Mendapatkan konten dari editor
                    formData.append('content', additionalContent);


                    $('.image').each(function(index, element) {
                        formData.append('image' + (index + 1), element.files[0]);
                    });
                    $.ajax({
                        url: '{{ route('front-end.about-us.store') }}',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        // data: {
                        //     header: header,
                        //     content: content,
                        //     _token: '{{ csrf_token() }}'
                        // },
                        success: function(response) {
                            console.log('Konten disimpan');
                            iziToast.success({
                                title: 'Pemberitahuan',
                                message: response.message,
                            });
                            location.reload();
                            // Tambahkan logika atau respons lainnya di sini
                        },
                        error: function(xhr, status, error) {
                            console.error('Gagal menyimpan konten');
                            // Tambahkan penanganan kesalahan di sini
                        }
                    });
                }
            });
        </script>
    @endsection
</x-app-layout>
