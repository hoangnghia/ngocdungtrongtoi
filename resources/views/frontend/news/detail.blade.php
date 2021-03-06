@extends('layouts.appfrontend')
@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/customstyle.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <h4>{{$news->title}}</h4>
                    <p>{{$news->description}}</p>
                    <div class="content">
                        {!!$news->content!!}


                        <h4 class="tac-gia">Phước Lợi</h4>
                        <h5 class="thoi-gian"> {{$news->created_at}}</h5>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="demo-slider">
                        <div id="amazingcarousel-container-7">
                            <div id="amazingcarousel-7"
                                 style="display: block; position: relative; width: 100%; max-width: 720px; margin: 0px auto; direction: ltr;">
                                <div class="amazingcarousel-list-container"
                                     style="position: relative; margin: 0px auto; overflow: visible; width: 720px;">
                                    <div class="amazingcarousel-list-wrapper"
                                         style="overflow: hidden; width: 720px;">
                                        <ul class="amazingcarousel-list"
                                            style="display: block; position: relative; list-style-type: none; list-style-image: none; background-image: none; background-color: transparent; padding: 0px; margin: 0px 0px 0px -707.689px; width: 4320px;">
                                            @foreach($newsdetail as $item)
                                                <li data-id="{{$item->id}}" class="show-image-album amazingcarousel-item amazingcarousel-item-0" style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left; width: 240px;">
                                                    <a href="/videos/detail/{{$item->id}}">
                                                        <div class="amazingcarousel-item-container"
                                                             style="position: relative; margin: 0px 2px;">
                                                            <div class="amazingcarousel-image image-slider-bottom">
                                                                <div class="html5lightbox modal_class"
                                                                     id="{{$item->id}}"
                                                                     data-toggle="modal"
                                                                     data-target="#modalimages">
                                                                    <img src="\public\uploads\{{$item->image_url}}"
                                                                         alt="Ngọc Dung"
                                                                         style="visibility: visible;">
                                                                </div>
                                                            </div>
                                                            <div class="amazingcarousel-title">{{$item->title}}</div>
                                                            <div class="amazingcarousel-description">{{$item->description}}</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="amazingcarousel-prev"
                                         style="overflow: hidden; position: absolute; cursor: pointer; width: 48px; height: 48px; background: url(&quot;https://amazingcarousel.com/wp-content/uploads/amazingcarousel/7/carouselengine/skins/arrows-48-48-2.png&quot;) left top no-repeat; display: block;"></div>
                                    <div class="amazingcarousel-next"
                                         style="overflow: hidden; position: absolute; cursor: pointer; width: 48px; height: 48px; background: url(&quot;https://amazingcarousel.com/wp-content/uploads/amazingcarousel/7/carouselengine/skins/arrows-48-48-2.png&quot;) right top no-repeat; display: block;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra_scripts')
    <script type="text/javascript" src="{{ asset('assets/js/jssor.slider.min.js')}}"></script>
    <script>
        var options = {$AutoPlay: 1};
        var jssor_1_slider = new $JssorSlider$("jssor_1", options);
    </script>
@endsection