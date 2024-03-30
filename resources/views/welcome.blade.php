<x-app-layout-frontend>
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="pt-5 no-bottom vh-100"
            data-bgimage="url(front-end/images/background/bg.jpg) left bottom"
            data-bgimage_rtl="url(front-end/images/background/11-rtl.jpg) left bottom">
            <div class="v-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="spacer-single"></div>
                            <h6 class="wow fadeInUp" data-wow-delay=".5s"><span class="text-uppercase id-color-2">Pipe
                                    Solution Center</span></h6>
                            <div class="spacer-10"></div>
                            <h1 class="wow fadeInUp" data-wow-delay=".75s">Koneksi yang <span class="id-color-2">Aman,
                                </span> Layanan yang Tak Terkalahkan</h1>
                            <p class="wow fadeInUp lead" data-wow-delay="1s" style="text-decoration:underline">
                                Perusahaan pipa kami adalah pilihan utama bagi klien yang mengutamakan kualitas,
                                keandalan, dan inovasi dalam infrastruktur.</p>
                            <div class="spacer-10"></div>
                            <a href="explore.html" class="btn-main wow fadeInUp lead"
                                data-wow-delay="1.25s">Katalog</a>&nbsp;
                            <a href="create-options.html" class="btn-main btn-light wow fadeInUp lead"
                                data-wow-delay="1.25s">Tentang Kami</a>
                            <div class="row">
                                <div class="spacer-single"></div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.1s">
                                        <div class="de_count text-left">
                                            <h3><span>99k+</span></h3>
                                            <h5>Customer</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.4s">
                                        <div class="de_count text-left">
                                            <h3><span>10k+</span></h3>
                                            <h5>Produk</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.7s">
                                        <div class="de_count text-left">
                                            <h3><span>40+</span></h3>
                                            <h5>Negara Terjangkau</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-sm-30"></div>
                        </div>
                        <div class="col-md-6">
                            {{-- <section id="section-hero" class="no-bottom"
                                data-bgimage="url(images/background/12.jpg) bottom"
                                style="background: url(&quot;images/background/12.jpg&quot;) center bottom / cover;">
                                <div class="container" style="background-size: cover;">


                                    <div id="items-carousel-big" class="owl-carousel owl-loaded owl-drag">


                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="transform: translate3d(-5184px, 0px, 0px); transition: all 0.25s ease 0s; width: 9072px; background-size: cover;">
                                                <div class="owl-item cloned">
                                                    <div class="nft__item_lg">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-12">
                                                                <img src="https://madebydesignesia.com/themes/gigaland/images/carousel/crs-9.jpg"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="owl-nav" style="background-size: cover;"><button type="button"
                                                role="presentation" class="owl-prev"><i
                                                    class="fa fa-chevron-left"></i></button><button type="button"
                                                role="presentation" class="owl-next"><i
                                                    class="fa fa-chevron-right"></i></button></div>
                                        <div class="owl-dots disabled" style="background-size: cover;"></div>
                                    </div>
                                </div>
                            </section> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php
            // $category = ['anchor', 'bolts', 'manchine', 'screws', 'rivets', 'nuts', 'socket screws', 'Washer', 'clips & pins', 'structure & marine product', 'wire thread insert', 'other'];
        @endphp
        <section id="section-category" aria-label="section">
            {{-- <div class="col-lg-12" style="background-size: cover;">
                <div class="text-center" style="background-size: cover;">
                    <h2>Kategori Produk</h2>
                    <div class="small-border bg-color-2" style="background-size: cover;"></div>
                </div>
            </div> --}}
            <div class="d-carousel">
                <div id="item-carousel-big-type-4" class="owl-carousel owl-center wow fadeIn" data-wow-delay="1s">
                    @foreach ($category as $el)
                        <div class="nft_pic mod-a">
                            <a href="{{ route('product-details') }}">
                                <span class="nft_pic_info">
                                    <span class="nft_pic_title">{{ $el->name }}</span>
                                    <span class="nft_pic_by">-</span>
                                </span>
                            </a>
                            <div class="nft_pic_wrap">
                                <img src="https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg?size=626&ext=jpg&ga=GA1.1.735520172.1710892800&semt=ais"
                                    class="lazy img-fluid" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-arrow-left mod-a"><i class="fa fa-angle-left"></i></div>
                <div class="d-arrow-right mod-a"><i class="fa fa-angle-right"></i></div>
            </div>
        </section>

        <section id="section-collections" class="pt60 pb60" data-bgcolor="#f7ffe7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="style-2">Produk Populer</h2>
                    </div>
                    @foreach ($item as $el)
                    <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12"
                        style="display: block; background-size: cover;">
                        <div class="nft__item style-2" style="background-size: cover;">

                            <div class="nft__item_wrap" style="background-size: cover; height: 221px;">
                                <div class="nft__item_extra"
                                    style="background-size: cover; visibility: hidden; opacity: 0;">
                                    <div class="nft__item_buttons" style="background-size: cover;">
                                        <button onclick="location.href='{{ route('product-details') }}'">Buy
                                            Now</button>
                                        <div class="nft__item_share" style="background-size: cover;">
                                            <h4>Share</h4>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://gigaland.io"
                                                target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                                            <a href="https://twitter.com/intent/tweet?url=https://gigaland.io"
                                                target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                                            <a
                                                href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site https://gigaland.io"><i
                                                    class="fa fa-envelope fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('product-details') }}">
                                    <img src="https://images.tokopedia.net/img/cache/900/VqbcmM/2022/5/31/d433e28b-a196-4417-91f5-febc740cb744.jpg"
                                        class="lazy nft__item_preview" alt="">
                                </a>
                            </div>
                            <div class="nft__item_info" style="background-size: cover;">
                                <a href="{{ route('product-details') }}">
                                    <h4 style="margin-right: 25px;">{{$el->name}}</h4>
                                </a>
                                <div class="nft__item_click" style="background-size: cover;">
                                    <span></span>
                                </div>
                                <div class="nft__item_action" style="background-size: cover;">
                                    <a href="#"></a>
                                    <br>
                                </div>
                                <div class="nft__item_like" style="background-size: cover;">
                                    <i class="fa fa-heart"></i><span>50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
        </section>

        <section id="section-collections" class="pt30" style="background-size: cover;" data-bgcolor="#F7F4FD">
            <div class="container" style="background-size: cover;">

                <div class="spacer-single" style="background-size: cover;"></div>

                <div class="row wow fadeIn animated"
                    style="background-size: cover; visibility: visible; animation-name: fadeIn;">
                    <div class="col-lg-12" style="background-size: cover;">
                        <h2 class="style-2">Produk Baru</h2>
                    </div>
                    @foreach ($item as $el)
                        <div class="d-item col-lg-3 col-md-6 col-sm-6 col-xs-12"
                            style="display: block; background-size: cover;">
                            <div class="nft__item style-2" style="background-size: cover;">

                                <div class="nft__item_wrap" style="background-size: cover; height: 221px;">
                                    <div class="nft__item_extra"
                                        style="background-size: cover; visibility: hidden; opacity: 0;">
                                        <div class="nft__item_buttons" style="background-size: cover;">
                                            <button onclick="location.href='{{ route('product-details') }}'">Buy
                                                Now</button>
                                            <div class="nft__item_share" style="background-size: cover;">
                                                <h4>Share</h4>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://gigaland.io"
                                                    target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                                                <a href="https://twitter.com/intent/tweet?url=https://gigaland.io"
                                                    target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                                                <a
                                                    href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site https://gigaland.io"><i
                                                        class="fa fa-envelope fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('product-details') }}">
                                        <img src="https://images.tokopedia.net/img/cache/900/VqbcmM/2022/5/31/d433e28b-a196-4417-91f5-febc740cb744.jpg"
                                            class="lazy nft__item_preview" alt="">
                                    </a>
                                </div>
                                <div class="nft__item_info" style="background-size: cover;">
                                    <a href="{{ route('product-details') }}">
                                        <h4 style="margin-right: 25px;">{{$el->name}}</h4>
                                    </a>
                                    <div class="nft__item_click" style="background-size: cover;">
                                        <span></span>
                                    </div>
                                    <div class="nft__item_action" style="background-size: cover;">
                                        <a href="#"></a>
                                        <br>
                                    </div>
                                    <div class="nft__item_like" style="background-size: cover;">
                                        <i class="fa fa-heart"></i><span>50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    </div>
    <section id="section-hero" aria-label="section" class="no-top no-bottom vh-100"
        data-bgimage="url(front-end/images/background/bg-shape-1.jpg) bottom"
        style="background: url(&quot;images/background/bg-shape-1.jpg&quot;) center bottom / cover;">
        <div class="v-center" style="background-size: cover;">
            <div class="container" style="background-size: cover;">
                <div class="row align-items-center" style="background-size: cover;">
                    <div class="col-md-6" style="background-size: cover;">
                        <div class="spacer-single" style="background-size: cover;"></div>
                        <h6 class="wow fadeInUp animated" data-wow-delay=".5s"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><span
                                class="text-uppercase id-color-2">PIPE SOLUTION CENTER</span></h6>
                        <div class="spacer-10" style="background-size: cover;"></div>
                        <h1 class="wow fadeInUp animated" data-wow-delay=".75s"
                            style="visibility: visible; animation-delay: 0.75s; animation-name: fadeInUp;">
                            Established in 1980.</h1>
                        <p class="wow fadeInUp lead animated" data-wow-delay="1s"
                            style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">Sin Hong
                            Hardware Pte Ltd has expanded rapidly to become one of the largest stockists and
                            distributors of a wide range of industrial fasteners, and a specialist in Standard,
                            Non-standard and customised Fasteners.</p>
                        <div class="spacer-10" style="background-size: cover;"></div>
                        <a href="explore.html" class="btn-main wow fadeInUp lead animated" data-wow-delay="1.25s"
                            style="visibility: visible; animation-delay: 1.25s; animation-name: fadeInUp;">Hubungi
                            Kami</a>
                        <div class="mb-sm-30" style="background-size: cover;"></div>
                    </div>
                    <div class="col-md-6 xs-hide" style="background-size: cover;">
                        <img src="https://lh3.googleusercontent.com/p/AF1QipPEzRIond-5aMxLmYw3Y89K76QSfyhQL8zLwRDD=s680-w680-h510"
                            class="lazy img-fluid wow fadeIn animated" data-wow-delay="1.25s" alt=""
                            style="visibility: visible; animation-delay: 1.25s; animation-name: fadeIn;border-radius: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content close -->

</x-app-layout-frontend>
