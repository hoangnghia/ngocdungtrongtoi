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
                @foreach($video as $item)
                <div class="col-lg-4">
                    <a href="/chi-tiet-video/{{$item->id}}">
                        <div class="video">
                            <img src="\public\uploads\{{$item->img_url}}" class="photobox__preview" alt="Preview">
                        </div>
                        <h2 class="title-text">{{$out = strlen($item->title) > 100 ? substr($item->title,0,100)."..." : $item->title}}</h2>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('extra_scripts')
@endsection