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



    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-3 col-3">
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="#">
                    @csrf
                    <input type="text" class="form-control" name="header" value="{{aboutUs()->header}}">
                    <br>
                    <div id="myEditor">{!! aboutUs()->body !!}</div>
                    <br>
                    <button id="saveButton" class="btn btn-primary" type="button">Save</button>
                </form>
            </div>
        </div>
    </section>


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
                    $.ajax({
                        url: '{{ route('front-end.about-us.store') }}',
                        method: 'POST',
                        data: {
                            content: content,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Konten disimpan');
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
