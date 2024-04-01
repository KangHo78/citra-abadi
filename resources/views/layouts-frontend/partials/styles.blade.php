<!-- CSS Files
    ================================================== -->
<link id="bootstrap" href="{{ asset('front-end/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link id="bootstrap-grid" href="{{ asset('front-end/css/bootstrap-grid.min.css') }}" rel="stylesheet" type="text/css" />
<link id="bootstrap-reboot" href="{{ asset('front-end/css/bootstrap-reboot.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('front-end/css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front-end/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front-end/css/owl.theme.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front-end/css/owl.transitions.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front-end/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front-end/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('front-end/css/style.css') }}" rel="stylesheet" type="text/css" />
<!-- color scheme -->
<link id="colors" href="{{ asset('front-end/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('front-end/css/coloring.css') }}" rel="stylesheet" type="text/css" />


{{-- cdn select2 --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet" />


<style>
    /* floating button */
    .floating-button {
        position: fixed;
        /* width: 100%; */
        /* height: 100%; */
        bottom: 0;
        right: 0;
        text-align: right;
        padding: 30px;
        box-sizing: border-box;
        z-index: 999;
    }

    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 15px;
    }

    #de-submenu-notification li {
        line-height: 20px;
        border-top: 1px solid rgb(190, 190, 190);
        padding-bottom: 10px;
        padding-top: 10px;
        margin-bottom:0px;
    }

    .switch-with-title{
        border-radius: 10px;
    }

    <style>
            /* Styling for Select2 container */
            .select2-container {
                box-sizing: border-box;
                display: inline-block;
                position: relative;
                width: 100%;
                /* Sesuaikan lebar sesuai kebutuhan Anda */
            }

            /* Styling for Select2 dropdown */
            .select2-dropdown {
                position: absolute;
                z-index: 9999;
                /* Sesuaikan dengan kebutuhan Anda */
                width: 100%;
                /* Sesuaikan lebar sesuai kebutuhan Anda */
                background-color: #fff;
                /* Warna latar belakang dropdown */
                border: 1px solid #ccc;
                /* Warna border dropdown */
                border-radius: 4px;
                /* Sudut border dropdown */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Efek bayangan dropdown */
            }

            /* Styling for Select2 options */
            .select2-results__option {
                padding: 8px 12px;
                /* Padding opsi dropdown */
                cursor: pointer;
            }

            /* Styling for Select2 selected option */
            .select2-selection__rendered {
                padding: 5px 10px;
                /* Padding untuk opsi yang dipilih */
                background-color: #f0f0f0;
                /* Warna latar belakang opsi yang dipilih */
                border: 1px solid #ccc;
                /* Warna border opsi yang dipilih */
                border-radius: 4px;
                /* Sudut border opsi yang dipilih */
            }

            /* Styling for Select2 arrow */
            .select2-selection__arrow {
                position: absolute;
                top: 50%;
                right: 10px;
                /* Sesuaikan dengan kebutuhan Anda */
                transform: translateY(-50%);
            }

            /* Styling for Select2 disabled state */
            .select2-container--disabled .select2-selection__rendered {
                background-color: #f5f5f5;
                /* Warna latar belakang untuk opsi yang dinonaktifkan */
                color: #999;
                /* Warna teks untuk opsi yang dinonaktifkan */
            }

            .select2-dropdown{
                margin-top:10px;
            }
        </style>
</style>
