@extends('layouts.appfrontend')
@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/customstyle.css') }}">
@endsection
@section('content')
    <div class="container">
            <div class="txt_about_us">
                <h2>BẢN TIN NỘI BỘ</h2>
                <div class="flower">
                    <img src="\public\uploads\flower.png" alt="flower">
                </div>
            </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="content-news">
                    @foreach($news as $item)
                    <div class="row item_tintuc">
                        <div class="img_item_tintuc">
                            <a href="/chi-tiet-bai-viet/{{$item->id}}"><img src="\public\uploads\{{$item->image_url}}" alt=""></a>
                        </div>
                        <div class="mota_item_tintuc">
                            <h2>{{$item->title}}</h2>
                            <p>{{$item->description}}</p>
                            <button><a href="/chi-tiet-bai-viet/{{$item->id}}"><span>+</span>Xem thêm</a></button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right">

                    <div class="tieudiem borderbox">
                        <p class="title_box borderbox">
                            <span>Bài viết mới nhất</span>
                            <i class="border_linetop"></i>
                        </p>
                        <ul>
                            @foreach($news as $item)
                            <li class="borderbox  top">
                                <a href="/chi-tiet-bai-viet/{{$item->id}}" title="{{$item->title}}">
                                    <img src="\public\uploads\{{$item->image_url}}" alt="{{$item->title}}">
                                </a>
                                <p><a href="/chi-tiet-bai-viet/{{$item->id}}" title="{{$item->title}}">{{$out = strlen($item->description) > 50 ? substr($item->description,0,50)."..." : $item->description}}</a></p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra_scripts')

@endsection