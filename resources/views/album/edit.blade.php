@extends('layouts.appadmin')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-icon">
                    <a href="{{url('/home')}}">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="{{url('/room')}}">Phòng ban</a>
                </li>
                <li class="crumb-trail">Cập nhật phòng ban</li>
            </ol>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Cập nhật chi nhánh</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" action="{{url('/edit/roompost')}}" class="form-horizontal form-label-left" method="POST">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên phòng ban <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first-name" name="name" required="required" value="{{$room->name}}" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $room->id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="phone" value="{{$room->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Chi nhánh</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="exampleFormControlSelect1" name="branch">
                                <option>Chọn chi nhánh</option>
                                @foreach($branch as $item)
                                    <option value="{{$item->id}}" @if( $room->id  == $item->id) selected="selected" @endif>
                                        {{$item->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" type="textarea" name="note"  id="describe" placeholder="Your describe Here" maxlength="6000" rows="7" value="">{{$room->note}}</textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection