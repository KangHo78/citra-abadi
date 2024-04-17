<x-app-layout>
    @section('styles')
        <!-- Include Froala Editor stylesheets -->
        <!-- Include Froala Editor script -->
    @endsection
    <x-slot name="header">
        <div class="row mb-2">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Services</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <button id="addItem" onclick="addItem()" class="btn btn-primary" type="button">Add Item</button>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>



    <form id="aboutUsForm" method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <section class="section">
            @foreach ($data as $el)
              
                <div class="card dataDetail">
                    <input name="id[]" type="hidden" class="dt" value="{{$el->id}}">
                    <input name="dt[]" type="hidden" class="dt" value="1">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-3 col-3">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5 col-lg-5 pb-2">
                                <div class="form-group parent" style="">
                                    <h6 class="form-label"><span>Gambar </span></h6>
                                    <input type="file" class="form-control image" name="image[]">
                                    <br>
                                    <img src="{{ asset($el->image) }}" alt="" width="100%">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 pb-2">
                                <div class="form-group parent" style="">
                                    <h6 class="form-label"><span>Header</span></h6>
                                    <input type="text" class="form-control header" name="header[]" value="{{$el->header}}">
                                </div>
                            </div>
                            <div class="col-sm-1 col-lg-1 pb-2">
                                <div class="form-group parent" style="">
                                    <h6 class="form-label"><span> &nbsp; </span></h6>
                                    <button class="btn btn-outline-danger rounded-pill"
                                            onclick="removeDetail(this)" type="button">
                                            <i class="bi bi-close"></i> X
                                    </button>
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-12 pb-2">
                                <div class="form-group parent" style="">
                                    <h6 class="form-label"><span>Body</span></h6>
                                    <input type="text" class="form-control body" name="body[]" value="{{$el->body}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </section>

        <div class="dropHere"></div>

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
                    saveContent();
                });

                function saveContent() {

                    var formData = new FormData($('#aboutUsForm')[0]);
                    var header = $('.header').val();

                    $('.image').each(function(index, element) {
                        formData.append('image' + (index + 1), element.files[0]);
                    });
                    $.ajax({
                        url: '{{ route('front-end.services.store') }}',
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

            function addItem(params) {
                $('.dropHere').append(`
                        <div class="card dataDetail">
                        <input name="id[]" type="hidden" class="dt" value="0">
                        <input name="dt[]" type="hidden" class="dt" value="0">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-3 col-3">
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5 col-lg-5 pb-2">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Gambar </span></h6>
                                            <input type="file" class="form-control image" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 pb-2">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Header</span></h6>
                                            <input type="text" class="form-control header" name="header[]" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-1 col-lg-1 pb-2">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span> &nbsp; </span></h6>
                                            <button class="btn btn-outline-danger rounded-pill"
                                                    onclick="removeDetail(this)" type="button">
                                                    <i class="bi bi-close"></i> X
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-12 pb-2">
                                        <div class="form-group parent" style="">
                                            <h6 class="form-label"><span>Body</span></h6>
                                            <input type="text" class="form-control body" name="body[]" value="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>`);
            }

            function removeDetail(dom) {
                var par = $(dom).parents('.dataDetail');
                $(par).remove();
                calc();
            }
        </script>
    @endsection
</x-app-layout>
