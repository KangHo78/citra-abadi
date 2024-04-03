<script src="{{ asset('front-end/js/jquery.min.js') }}"></script>
<script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front-end/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front-end/js/wow.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('front-end/js/easing.js') }}"></script>
<script src="{{ asset('front-end/js/owl.carousel.js') }}"></script>
<script src="{{ asset('front-end/js/validation.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front-end/js/enquire.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.plugin.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.lazy.plugins.min.js') }}"></script>
<script src="{{ asset('front-end/js/designesia.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

<script>
    document.getElementById("quick_search").addEventListener("keypress", function(event) {
        // Cek jika tombol yang ditekan adalah tombol "Enter" (kode 13)
        if (event.keyCode === 13) {
            // Mendapatkan nilai dari input
            var searchValue = event.target.value;

            // Lakukan pengalihan halaman ke halaman tujuan dengan menambahkan nilai pencarian ke URL
            window.location.href = "/catalog?q=" + encodeURIComponent(searchValue);
        }
    });
</script>


{{-- {{ $script ?? ''}} --}}
