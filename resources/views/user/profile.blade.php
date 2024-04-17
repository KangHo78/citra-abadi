<x-app-layout-frontend>

    <div class="no-bottom" id="content">
        <div id="top"></div>
        <section id="subheader" class="text-light"
            data-bgimage="url(https://madebydesignesia.com/themes/gigaland/images/background/subheader-dark.jpg) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h1>Profile</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <form id="aboutUsForm" method="POST" action="{{ route('update-profile', Auth::user()->id) }}"
            enctype="multipart/form-data">
            @csrf
            <section id="section-main" aria-label="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <form id="form-create-item" class="form-border" method="post" action="email.php">
                                <div class="de_tab tab_simple">

                                    <ul class="de_nav">
                                        <li class="active"><span><i class="fa fa-user"></i>Profile</span></li>
                                        <li><span><i class="fa fa-exclamation-circle"></i>History</span></li>
                                        {{-- <li><span><i class="fa fa-paint-brush"></i>Appearance</span></li> --}}
                                    </ul>

                                    <div class="de_tab_content">
                                        <div class="tab-1">
                                            <div class="row wow fadeIn">
                                                <div class="col-lg-8 mb-sm-20">
                                                    <div class="field-set">
                                                        <h5>Name</h5>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" placeholder="Enter Name"
                                                            value="{{ Auth::user()->name }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>Email Address</h5>
                                                        <input type="text" name="email_address" id="email_address"
                                                            class="form-control" placeholder="Enter email"
                                                            value="{{ Auth::user()->email }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>Phone</h5>
                                                        <input type="text" name="phone" id="phone"
                                                            class="form-control" placeholder="Enter phone"
                                                            value="{{ Auth::user()->phone }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>Position</h5>
                                                        <input type="text" name="position" id="position"
                                                            class="form-control" placeholder="Enter Position"
                                                            value="{{ Auth::user()->position }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>Company Name</h5>
                                                        <input type="text" name="company_name" id="company_name"
                                                            class="form-control" placeholder="Enter company name"
                                                            value="{{ Auth::user()->company_name }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>NPWP</h5>
                                                        <input type="text" name="npwp" id="npwp"
                                                            class="form-control" placeholder="Enter npwp"
                                                            value="{{ Auth::user()->npwp }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>NPWP Photo</h5>
                                                        <input type="file" class="form-control npwp_photo"
                                                            name="npwp_photo">
                                                        <br>
                                                        <img src="{{ asset(Auth::user()->npwp_photo) }}" alt=""
                                                            width="100%">

                                                        <div class="spacer-10"></div>

                                                        <h5>Address</h5>
                                                        <input type="text" name="address" id="address"
                                                            class="form-control" placeholder="Enter address"
                                                            value="{{ Auth::user()->address }}" />

                                                        <div class="spacer-10"></div>

                                                        <h5>Address 2</h5>
                                                        <input type="text" name="address_2" id="address_2"
                                                            class="form-control" placeholder="Enter address_2"
                                                            value="{{ Auth::user()->address_2 }}" />

                                                        <div class="spacer-10"></div>


                                                    </div>
                                                </div>

                                                <div id="sidebar" class="col-lg-4">
                                                    <h5>Profile image <i class="fa fa-info-circle id-color-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Recommend 400 x 400. Max size: 50MB. Click the image to upload."></i>

                                                    </h5>
                                                    <img src="{{ auth::user()->profile_photo_path }}"
                                                        class="d-profile-img-edit img-fluid"
                                                        alt="">

                                                    <div class="spacer-30"></div>
                                                    <input type="file" name="profile_photo_path"
                                                        class="form-control">



                                                    {{-- <h5>Profile banner <i class="fa fa-info-circle id-color-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Recommend 1500 x 500. Max size: 50MB. Click the image to upload."></i>
                                                </h5>
                                                <img src="images/author_single/author_banner.jpg" id="click_banner_img"
                                                    class="d-banner-img-edit img-fluid" alt="">
                                                <input type="file" id="upload_banner_img"> --}}

                                                </div>
                                                <div class="col-2">
                                                    <div class="spacer-30"></div>
                                                    <input type="submit" id="submit" class="btn-main"
                                                        value="Update profile">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-2">
                                            <div class="row wow fadeIn">
                                                <div class="col-md-12 mb-sm-20">
                                                    @foreach ($enquiry as $el)
                                                        <div class="spacer-20"></div>
                                                        <div class="switch-with-title s2">
                                                            <div class="row">
                                                                {{-- <div class="col-md-2 col-sm-3">
                                                            <img src="https://www.sinhong.com/UploadedImg/category/13062016_50832_PM_5_Nut_340A_bg.jpg"
                                                                class="lazy nft__item_preview" alt=""
                                                                width="100px">
                                                        </div> --}}
                                                                <div class="col-md-12 col-sm-12">
                                                                    <h3
                                                                        style="
                                                            float: left;
                                                            margin: 0px;
                                                        ">
                                                                        {{ $el->code }}</h3>
                                                                    <div class="de-switch">
                                                                        @if ($el->status == 1)
                                                                        <span class="badge bg-info">Permintaan Masuk</span>
                                                                    @elseif ($el->status == 2)
                                                                        <span class="badge bg-info">Penawaran Terkirim</span>
                                                                    @elseif ($el->status == 3)
                                                                        <span class="badge bg-warning">Follow Up</span>
                                                                    @elseif ($el->status == 4)
                                                                        <span class="badge bg-danger">Cancel</span>
                                                                    @elseif ($el->status == 5)
                                                                        <span class="badge bg-success">Deal</span>
                                                                    @endif
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <h6><u>Rp.
                                                                            {{ number_format($el->grand_total, 2, ',', '.') }}
                                                                            ({{ $el->enquiry_detail->count() }} Items)
                                                                        </u></h6>
                                                                    <div class="clearfix"></div>
                                                                    Note : {{ $el->desc }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-3">
                                            <div class="row wow fadeIn">
                                                <div class="col-md-6 mb-sm-30">
                                                    <h5>Language</h5>
                                                    <p class="p-info">Select your prefered language.</p>
                                                    <div id="select_lang" class="dropdown fullwidth">
                                                        <a href="#" class="btn-selector">English</a>
                                                        <ul>
                                                            <li class="active"><span>English</span></li>
                                                            <li><span>France</span></li>
                                                            <li><span>German</span></li>
                                                            <li><span>Japan</span></li>
                                                            <li><span>Italy</span></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <h5>Scheme</h5>
                                                    <p class="p-info">Customize how Gigaland looks for you.</p>
                                                    <div id="select_scheme" class="dropdown fullwidth">
                                                        <a href="#" class="btn-selector">Default scheme</a>
                                                        <ul>
                                                            <li class="active"><span>Default scheme</span></li>
                                                            <li><span>Light scheme</span></li>
                                                            <li><span>Dark scheme</span></li>
                                                            <li><span>Grey scheme</span></li>
                                                            <li><span>Retro scheme</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>

</x-app-layout-frontend>
