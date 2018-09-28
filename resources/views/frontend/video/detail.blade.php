@extends('layouts.appfrontend')
@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/customstyle.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="txt_about_us">
                <h2>VIDEO</h2>
                <div class="flower">
                    <img src="\public\uploads\flower.png" alt="flower">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <div class="video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video->url_video}}?rel=0"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <h4>{{$video->title}}</h4>
                    <p>{{$video->description}}</p>
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
                                            @foreach($videodetail as $item)
                                                <li data-id="{{$item->id}}" class="show-image-album amazingcarousel-item amazingcarousel-item-0" style="display: block; position: relative; background-image: none; background-color: transparent; margin: 0px; padding: 0px; float: left; width: 240px;">
                                                    <a href="/videos/detail/{{$item->id}}">
                                                        <div class="amazingcarousel-item-container"
                                                             style="position: relative; margin: 0px 2px;">
                                                            <div class="amazingcarousel-image">
                                                                <div class="html5lightbox modal_class"
                                                                     id="{{$item->id}}"
                                                                     data-toggle="modal"
                                                                     data-target="#modalimages">
                                                                    <img src="\public\uploads\{{$item->img_url}}"
                                                                         alt="Golden Wheat Field"
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
    <script src="jssor.slider.min.js"></script>
    <script>
        var options = {$AutoPlay: 1};
        var jssor_1_slider = new $JssorSlider$("jssor_1", options);
    </script>
@endsection