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
                    <a href="{{url('/news')}}">Phòng ban</a>
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
                <form id="demo-form2"  action="{{url('/news/editpost')}}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Danh mục<span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <select id="group" name="type" class="form-control input-md">
                                <option value="" @if( $news->type  == "") selected="selected" @endif>Choose...</option>
                                @foreach(\App\Models\News::TYPE as $key => $item)
                                    <option value="{{$key}}" @if( $news->type  == $key) selected="selected" @endif>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <input type="text" id="first-name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$news->title}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="textarea">Trích dẫn<span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12">{{$news->description}}</textarea>
                        </div>
                    </div>
                    <div class="section row mb10">
                        <label for="account-name" class="field-label col-md-1 text-center">Hình ảnh</label>
                        <div class="col-md-4">
                            <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail mb20">
                                    <img src="{{url('/public/uploads/'.$news->image_url)}}"  alt="holder">
                                </div>
                                <div class="row">
                                    <div class="col-xs-5">
                                <span class="button btn-system btn-file btn-block">
                                    <span class="fileupload-new">Chọn</span>
                                <span class="fileupload-exists">Thay đổi</span>
                                <input type="file" value="Select" name="link_image">
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="textarea">Nội dung<span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <textarea id="summary-ckeditor" required="required" name="contentpost" class="form-control col-md-7 col-xs-12">{{$news->content}}</textarea>
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