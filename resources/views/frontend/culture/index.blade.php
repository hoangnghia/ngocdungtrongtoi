@extends('layouts.appfrontend')
@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/customstyle.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs nav-justified my-2 nd-color-main cultures" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active font-weight-bold" data-toggle="tab" href="#panel_tamnhin"
                           role="tab">
                            <i class="fa fa-user"></i>Tầm nhìn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" data-toggle="tab" href="#panel_sumenh"
                           role="tab">
                            <i class="fa fa-heart"></i>Sứ mệnh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" data-toggle="tab" href="#panel_giatricotloi"
                           role="tab">
                            <i class="fa fa-heart"></i>Giá trị cốt lõi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" data-toggle="tab" href="#panel_chinhsach"
                           role="tab">
                            <i class="fa fa-heart"></i>Chính sách/phúc lợi</a>
                    </li>
                </ul>
                <!-- Nav tabs -->
                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 1-->
                    <div class="tab-pane fade in show active" id="panel_tamnhin" role="tabpanel">
                        <div class="container">
                            <div class="container value" id="value">
                                @foreach($culture as $item)
                               @if($item->type == 1)
                                <div class="intro_value" style="background: url('http://127.0.0.1:8000/public/uploads/{{$item->image_url}}');background-repeat: no-repeat;background-size: 100% 100%;">
                                    <h2>{{$item->title}}</h2>
                                </div>
                                <div class="content_value">
                                    <div class="txt_value">
                                        <div class="ct_txt_value">
                                           {!!$item->content!!}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--/.Panel 1-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="panel_sumenh" role="tabpanel">
                       <div class="container">
                            <div class="container value" id="value">
                                @foreach($culture as $item)
                                    @if($item->type == 2)
                                        <div class="intro_value" style="background: url('http://127.0.0.1:8000/public/uploads/{{$item->image_url}}');background-repeat: no-repeat;background-size: 100% 100%;">
                                            <h2>{{$item->title}}</h2>
                                        </div>
                                        <div class="content_value">
                                            <div class="txt_value">
                                                <div class="ct_txt_value">
                                                    {!!$item->content!!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--/.Panel 2-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="panel_giatricotloi" role="tabpanel">
                        <div class="container vision row" id="vision">
                            @foreach($culture as $item)
                                @if($item->type == 3)
                            <div class="img_vision">
                                <img src="http://127.0.0.1:8000/public/uploads/{{$item->image_url}}" alt="Tầm nhìn - Sứ mệnh">
                            </div>
                            <div class="content_vision">
                                <div class="title_vision">
                                    <h2>{{$item->title}}</h2>
                                </div>
                                <div class="line">
                                </div>
                                <div class="ct_vision">
                                    {!!$item->content!!}
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!--/.Panel 2-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="panel_chinhsach" role="tabpanel">
                        <div class="container">
                            @foreach($culture as $item)
                                @if($item->type == 4)
                            <h2>{{$item->title}}</h2>
                            <div class="content">
                                {!!$item->content!!}
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!--/.Panel 2-->
                </div>
                <!-- Tab panels -->
            </div>
        </div>
    </div>
@endsection
@section('extra_scripts')
@endsection

