@extends('layouts.appfrontend')
@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/customstyle.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
        </div>
    </div>
    <div class="menu-right">
        <ul>
            <li class="tinnong"><a href="/tin-nong.htm" title=""><i class="fas fa-book-open"></i><span>TIN NÓNG</span></a></li>
            <li class="media"><a href="/truyen-hinh-truc-tuyen.htm" title=""><i class="sprite"></i><span>MEDIA</span></a></li>
            <li class="magazine"><a href="/magazine.htm" title=""><i class="sprite"></i><span>MAGAZINE</span></a></li>
            <li class="infographic"><a href="/infographic.htm" title="Infographic"><i class="sprite"></i><span>INFOGRAPHIC</span></a></li>
            <li class="gocanh"><a href="/thu-vien-anh.htm" title="Góc ảnh"><i class="sprite"></i><span>GÓC ẢNH</span></a></li>
            <li class="sukien"><a href="/danh-sach-su-kien.htm" title="Sự kiện"><i class="sprite"></i><span>SỰ KIỆN</span></a></li>
        </ul>
    </div>
@endsection
@section('extra_scripts')

@endsection