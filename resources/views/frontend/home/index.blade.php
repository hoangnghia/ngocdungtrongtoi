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
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    @foreach($video as $item)
                        <div class="carousel-item {{ $loop->first ? ' active' : '' }}"
                             style="background-image: url('{{ asset('public/uploads/section-1.png')}}');">
                            <!--Mask-->
                            <div class="view">
                                <div class="full-bg-img flex-center mask rgba-indigo-light black-text">
                                    <ul class="animated fadeInUp col-lg-5 col-md-12 list-unstyled list-inline text-left">
                                        <li>
                                            <h1 class="nd-text-main text-uppercase">{{$item->title}}</h1>
                                        </li>
                                        <li>
                                            <p class="text-uppercase py-4">{{$item->description}}</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <a target="_blank" href="#"
                                               class="btn btn-lg blue-gradient btn-rounded font-weight-bold waves-effect waves-light ml-0">Xem
                                                thêm</a>
                                        </li>
                                    </ul>
                                    <div class="col-lg-6 col-md-12 animated fadeInUp">
                                        <div class="embed-responsive embed-responsive-4by3 z-depth-2">
                                            <iframe class="embed-responsive-item"
                                                    src="https://www.youtube.com/embed/{{$item->url_video}}"
                                                    style="height: 101%" allowfullscreen></iframe>
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
@endsection
@section('extra_scripts')
    <script src="jssor.slider.min.js"></script>
    <script>
        var options = {$AutoPlay: 1};
        var jssor_1_slider = new $JssorSlider$("jssor_1", options);
    </script>
    <script>
        $(".show-image-album ").click(function () {

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
                data: {id: 23},
                success: function (response) {
                    if (response.result) {
                        console.log(response.data);

                        $('.image-title').html(response.data[0].title);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });
    </script>
@endsection