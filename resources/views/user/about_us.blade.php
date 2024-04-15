<x-app-layout-frontend>
    <div class="no-bottom" id="content">
        <div id="top"></div>
        <section id="subheader" class="text-light"
            data-bgimage="url(https://madebydesignesia.com/themes/gigaland/images/background/subheader-dark.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>About Us</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section begin -->
        <section id="section-hero" aria-label="section" class="mb100 mt100"
            data-bgimage="url(front-end/images/background/bg-shape-1.jpg) bottom"
            style="background: url(&quot;images/background/bg-shape-1.jpg&quot;) center bottom / cover;">
            <div class="v-center" style="background-size: cover;">
                <div class="container" style="background-size: cover;">
                    <div class="row align-items-center" style="background-size: cover;">
                        <div class="col-md-7 " style="background-size: cover;">
                            <div class="spacer-single" style="background-size: cover;"></div>
                            <h6 class="wow fadeInUp animated" data-wow-delay=".5s"
                                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><span
                                    class="text-uppercase id-color-2">PIPE SOLUTION CENTER</span></h6>
                            <div class="spacer-10" style="background-size: cover;"></div>
                            <h1 class="wow fadeInUp animated" data-wow-delay=".75s"
                                style="visibility: visible; animation-delay: 0.75s; animation-name: fadeInUp;">
                                {{ aboutUs()->header }}</h1>
                            <p class="wow fadeInUp lead animated" data-wow-delay="1s"
                                style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                               {!! aboutUs()->body !!}
                            </p>
                            <div class="spacer-10" style="background-size: cover;"></div>
                            
                            <a href="explore.html" class="btn-main wow fadeInUp lead animated" data-wow-delay="1.25s"
                                style="visibility: visible; animation-delay: 1.25s; animation-name: fadeInUp;">Browsur</a>

                            <a href="explore.html" class="btn-main wow fadeInUp lead animated" data-wow-delay="1.25s"
                                style="visibility: visible; animation-delay: 1.25s; animation-name: fadeInUp;">Perjanjian</a>
                        
                            <a href="explore.html" class="btn-main wow fadeInUp lead animated" data-wow-delay="1.25s"
                                style="visibility: visible; animation-delay: 1.25s; animation-name: fadeInUp;">Hubungi
                                Kami</a>

                            <div class="mb-sm-30" style="background-size: cover;"></div>
                        </div>
                        <div class="col-md-5 xs-hide" style="background-size: cover;">
                            <img src="{{ asset(aboutUs()->image1) }}"
                                class="lazy img-fluid wow fadeIn animated" data-wow-delay="1.25s" alt=""
                                style="visibility: visible; animation-delay: 1.25s; animation-name: fadeIn;border-radius: 10px;width:100vh">

                            <img src="{{asset(aboutUs()->image2)}}"
                                class="lazy img-fluid wow fadeIn animated pt20" data-wow-delay="1.25s" alt=""
                                style="visibility: visible; animation-delay: 1.25s; animation-name: fadeIn;border-radius: 10px;width:100vh">


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>




</x-app-layout-frontend>
