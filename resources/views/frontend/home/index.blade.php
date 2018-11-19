@extends('layouts.appfrontend')
@section('mainhead')
    <div id="main-head" class="view jarallax" data-speed="0.2">
        <div class="mask rgba-stylish-light">
            <!--Carousel Wrapper-->
            <div id="home-banner-carousel-1" class="carousel slide carousel-fade" data-ride="carousel"
                 data-interval="false">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#home-banner-carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#home-banner-carousel-1" data-slide-to="1"></li>
                    <li data-target="#home-banner-carousel-1" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner top" role="listbox">
                    <!--First slide-->
                    @foreach($video as $item)
                        <div class="carousel-item {{ $loop->first ? ' active' : '' }}"
                             style="background-image: url('{{ asset('public/uploads/section-1.png')}}');">
                            <!--Mask-->
                            <h1 class="secton-title-top">BẢNG TIN NỘI BỘ</h1>
                            <div class="view">
                                <div class="full-bg-img flex-center mask  black-text container">
                                    <div class="row">
                                        <ul class="animated fadeInUp col-lg-6 col-md-12 list-unstyled list-inline text-left">
                                            <li>
                                                <h1 class="nd-text-main text-uppercase">{{$out = strlen($item->title) > 200 ? substr($item->title,0,200)."..." : $item->title}}</h1>
                                            </li>
                                            <li>
                                                <p class="text-uppercase py-4">{{$out = strlen($item->description) > 500 ? substr($item->description,0,500)."..." : $item->description}}</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <a target="_blank" href="#"
                                                   class="btn btn-lg blue-gradient btn-rounded font-weight-bold waves-effect waves-light ml-0">Xem
                                                    thêm</a>
                                            </li>
                                        </ul>
                                        <div class="col-lg-6 col-md-12 animated fadeInUp">
                                            <div class="embed-responsive embed-responsive-4by3 z-depth-2">
                                                {{--<iframe class="embed-responsive-item"--}}
                                                        {{--src="https://www.youtube.com/embed/{{$item->url_video}}"--}}
                                                        {{--style="height: 100%" allowfullscreen></iframe>--}}
                                                <iframe width="450" height="250" src="https://www.youtube.com/embed/{{$item->url_video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.Mask-->
                        </div>
                @endforeach
                <!--/.First slide-->
                </div>
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>
@endsection
@section('content')
    <!-- Section: Gallery -->
    <section id="gallery" class="section wow fadeIn my-5" data-wow-delay="0.3s">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs nav-justified my-2 nd-color-main" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold" data-toggle="tab" href="#panel_hinhanhhoatdong"
                               role="tab">
                                <i class="fa fa-user"></i> Hình ảnh hoạt động</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" data-toggle="tab" href="#panel_videohoatdong"
                               role="tab">
                                <i class="fa fa-heart"></i> Video hoạt động</a>
                        </li>
                    </ul>
                    <!-- Nav tabs -->
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel_hinhanhhoatdong" role="tabpanel">

                            <div class="container">

                                <div class="row slick-action">
                                @foreach($album as $item)
                                    <!-- Grid column -->
                                        <div class="col-lg-12 col-md-12 mb-4 photobox_type11" data-id="{{$item->id}}"
                                             data-toggle="modal" data-target="#hinhanh_slider_1">

                                            <a><img class="img-fluid z-depth-1"
                                                    src="\public\uploads\{{$item->image_url}}" alt="video"></a>

                                            <h6 class="mt-3 font-weight-bold text-uppercase">
                                                <span>{{$out = strlen($item->title) > 100 ? substr($item->title,0,100)."..." : $item->title}}</span>
                                            </h6>

                                        </div>
                                        <!-- Grid column -->
                                    @endforeach
                                </div>

                                <!--Modal: Name-->
                                <div class="modal fade" id="hinhanh_slider_1" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                                        <!--Content-->
                                        <div class="modal-content">

                                            <!--Body-->
                                            <div class="modal-body mb-0 p-0">

                                                <!--Carousel Wrapper-->
                                                <div id="carousel-hinhanh-1z" class="carousel slide carousel-fade"
                                                     data-ride="carousel">
                                                    <!--Indicators-->
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carousel-hinhanh-1z" data-slide-to="0"
                                                            class="active"></li>
                                                        <li data-target="#carousel-hinhanh-1z" data-slide-to="1"></li>
                                                        <li data-target="#carousel-hinhanh-1z" data-slide-to="2"></li>
                                                    </ol>
                                                    <!--/.Indicators-->
                                                    <!--Slides-->
                                                    <div class="carousel-inner item-album" role="listbox">
                                                        <!--First slide-->
                                                        <div class="carousel-item  active">

                                                        </div>
                                                        <!--/First slide-->
                                                    </div>
                                                    <!--/.Slides-->
                                                    <!--Controls-->
                                                    <a class="carousel-control-prev" href="#carousel-hinhanh-1z"
                                                       role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carousel-hinhanh-1z"
                                                       role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                              aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                    <!--/.Controls-->
                                                </div>
                                                <!--/.Carousel Wrapper-->

                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">
                                                <span class="mr-4">Spread the word!</span>
                                                <a type="button" class="btn-floating btn-sm btn-fb"><i
                                                            class="fa fa-facebook"></i></a>
                                                <!--Twitter-->
                                                <a type="button" class="btn-floating btn-sm btn-tw"><i
                                                            class="fa fa-twitter"></i></a>
                                                <!--Google +-->
                                                <a type="button" class="btn-floating btn-sm btn-gplus"><i
                                                            class="fa fa-google-plus"></i></a>
                                                <!--Linkedin-->
                                                <a type="button" class="btn-floating btn-sm btn-ins"><i
                                                            class="fa fa-linkedin"></i></a>

                                                <button type="button"
                                                        class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                                        data-dismiss="modal">Close
                                                </button>

                                            </div>

                                        </div>
                                        <!--/.Content-->

                                    </div>
                                </div>
                                <!--Modal: Name-->


                            </div>

                        </div>
                        <!--/.Panel 1-->

                        <!--Panel 2-->
                        <div class="tab-pane fade" id="panel_videohoatdong" role="tabpanel">

                            <div class="container">
                                <!-- Grid row -->
                                <div class="row slick-action">
                                @foreach($listvideo as $item)
                                    <!-- Grid column -->
                                        <div class="col-lg-12 col-md-12 mb-4 photobox_type12 "
                                             data-id="{{$item->url_video}}" data-toggle="modal"
                                             data-target="#video_modal_1">

                                            <a><img class="img-fluid z-depth-1" src="\public\uploads\{{$item->img_url}}"
                                                    alt="video"></a>
                                            <h5 class="mt-3 font-weight-bold text-uppercase">
                                                <span>{{$out = strlen($item->title) > 100 ? substr($item->title,0,100)."..." : $item->title}}</span>
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Grid row -->

                                <!--Modal: Name-->
                                <div class="modal fade" id="video_modal_1" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                                        <!--Content-->
                                        <div class="modal-content">

                                            <!--Body-->
                                            <div class="modal-body mb-0 p-0">

                                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half item-video">

                                                </div>

                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">
                                                <span class="mr-4">Spread the word!</span>
                                                <a type="button" class="btn-floating btn-sm btn-fb"><i
                                                            class="fa fa-facebook"></i></a>
                                                <!--Twitter-->
                                                <a type="button" class="btn-floating btn-sm btn-tw"><i
                                                            class="fa fa-twitter"></i></a>
                                                <!--Google +-->
                                                <a type="button" class="btn-floating btn-sm btn-gplus"><i
                                                            class="fa fa-google-plus"></i></a>
                                                <!--Linkedin-->
                                                <a type="button" class="btn-floating btn-sm btn-ins"><i
                                                            class="fa fa-linkedin"></i></a>

                                                <button type="button"
                                                        class="btn btn-outline-primary btn-rounded btn-md ml-4"
                                                        data-dismiss="modal">Close
                                                </button>

                                            </div>

                                        </div>
                                        <!--/.Content-->

                                    </div>
                                </div>
                                <!--Modal: Name-->
                            </div>

                        </div>
                        <!--/.Panel 2-->
                    </div>
                    <!-- Tab panels -->
                </div>
            </div>
        </div>

    </section>
    <!-- /Section: Gallery -->
    <!-- Section: Team v.3 -->
    <section id="team" class="section team-section pb-4 wow fadeIn text-center" data-wow-delay="0.3s">

        <h2 class="section-title btn peach-gradient btn-rounded h1-responsive text-white font-weight-bold my-5">Cảm nhận
            của nhân viên</h2>

        <!-- Carousel Wrapper -->
        <div id="carousel-employees_feeling" class="carousel no-flex testimonial-carousel slide carousel-fade"
             data-ride="carousel" data-interval="false">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
            @foreach($feel as $item)
            <!--First slide-->
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                    <div class="testimonial">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                    <!--Avatar-->
                                    <div class="avatar mx-auto mb-4">
                                        <img src="\public\uploads\{{$item->image_url}}"
                                             class="rounded-circle img-fluid" alt="First sample avatar image">
                                    </div>
                                    <h4 class="font-weight-bold nd-text-main">{{$item->name}}</h4>
                                    <h6 class="font-weight-bold nd-text-main my-3">{{$item->title}}</h6>
                                    <!--Review-->
                                    <div class="orange-text">
                                        <i class="fa fa-star"> </i>
                                        <i class="fa fa-star"> </i>
                                        <i class="fa fa-star"> </i>
                                        <i class="fa fa-star"> </i>
                                        <i class="fa fa-star-half-full"> </i>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <!--Content-->
                                    <p class="text-white">
                                        <i class="fa fa-quote-left"></i>{{$item->description}}
                                    </p>
                                    <a class="btn btn-primary" href="/chi-tiet-bai-viet/{{$item->id}}">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--First slide-->
                @endforeach
            </div>
            <!--Slides-->
            <!--Controls-->
            <a class="carousel-item-prev left carousel-control" href="#carousel-employees_feeling" role="button"
               data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-item-next right carousel-control" href="#carousel-employees_feeling" role="button"
               data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--Controls-->
        </div>

    </section>
    <!-- Section: Team v.3 -->
    <!-- Section: Features v.1 -->
    <section id="products" class="text-center wow fadeIn my-5" data-wow-delay="0.3s">

        <div class="container">
            <!--Section heading-->
            <h2 class="btn blue-gradient btn-rounded font-weight-bold waves-effect waves-light section-title text-center my-5 h1-responsive">
                Bản tin nội bộ</h2>
            <!--Grid row-->
            <div class="row">
            @foreach($news as $item)
                <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">
                       <div class="news-item">
                           <!--Featured image-->
                           <div class="view overlay z-depth-1 mb-2">
                               <img src="\public\uploads\{{$item->image_url}}" class="img-fluid" alt="First sample image">
                               <a>
                                   <div class="mask rgba-white-slight"></div>
                               </a>
                           </div>
                           <!--Excerpt-->
                           <h6 class="font-weight-bold mb-3">{{$out = strlen($item->title) > 100 ? substr($item->title,0,100)."..." : $item->title}}</h6>
                           <p>{{$out = strlen($item->description) > 200 ? substr($item->description,0,200)."..." : $item->description}}</p>
                       </div>
                        <a class="btn btn-primary" href="/chi-tiet-bai-viet/{{$item->id}}">Xem thêm</a>
                    </div>
                    <!--Grid column-->
                @endforeach
            </div>
            <!--Grid row-->
        </div>

    </section>
    <!-- Section: Features v.1 -->
@endsection
@section('extra_scripts')
    <script>
        // chi tiet image
        $(".photobox_type11 ").click(function () {
            var album_id = $(this).data('id');
            // TODO: Call ajax get image from alubm ID
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax("<?php echo e(url('/image/get')); ?>", {
                type: 'POST',
                dataType: 'json',
                data: {id: album_id},
                success: function (response) {
                    ;
                    var html = '';
                    var i;
                    for (i = 0; i < response.data.length; ++i) {
                        var image_url = response.data[i].image_url;
                        var title = response.data[i].title;
                        var isFirst = i == 0 ? 'active' : '';
                        html += '<div class="carousel-item ' + isFirst + '"> <img class="d-block w-100" src="/public/uploads/' + image_url + '" alt="' + title + '"><h3>' + title + '</h3> </div>';
                    }
                    $('.item-album').html(html);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });

        // video
        $(".photobox_type12 ").click(function () {
            var videourl = $(this).data('id');
            var html = '';
            // TODO: Call ajax get image from alubm ID
            html += '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + videourl + '" allowfullscreen></iframe>';
            $('.item-video').html(html);
        });
    </script>
@endsection