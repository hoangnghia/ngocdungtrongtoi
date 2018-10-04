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
                    <a href="{{url('/port')}}">Bài viết</a>
                </li>
                <li class="crumb-trail">Thêm phòng ban</li>
            </ol>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm bài viết</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2"  action="{{url('/album/createPort')}}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Danh mục<span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <select id="group" name="type" class="form-control input-md">
                                <option value="">Chọn loại</option>
                                @foreach(\App\Models\Album::TYPE as $key => $item)
                                    <option value="{{$key}}">
                                        {{$item}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <input type="text" id="first-name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="textarea">Trích dẫn<span class="required">*</span>
                        </label>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="section row mb10">
                        <label for="account-name" class="field-label col-md-1 text-center">Hình ảnh</label>
                        <div class="col-md-4">
                            <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail mb20">
                                    <img src="{{url(config('constants.POST_TYPE_FOLDER') . '/' . $post->image_url)}}" data-src="holder.js/100%x140" alt="holder">
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
                            <textarea id="summary-ckeditor" required="required" name="contentpost" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div id="service_select">
                    <div class="service_select_form row">
                        <div id="sv_box_group" class="col-md-8 col-sm-8 col-xs-12">
                            <div id="sv_box_1" class="w3-row-padding sv_image w3-panel w3-border-top w3-border-bottom w3-border-green row">
                                <div class="w3-half col-md-6 col-sm-6 col-xs-12">
                                    <label for="img_sv_box_1">Ảnh</label>
                                    <input type='file' name="img_sv_box[]" id='img_sv_box_1' class="w3-input">
                                </div>
                                <div class="w3-half col-sm-6 col-xs-12">
                                    <label for='text_sv_box_1'>Tiêu đề</label>
                                    <input type='text' name='text_sv_box[]' id='text_sv_box_1' class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="sv_counter" name="sv_counter" value="1">
                        <button id="addButton" type='button' class="btn btn-primary">Thêm hình ảnh</button>
                        <button id="removeButton" type='button' class="btn btn-danger">Bỏ hình ảnh</button>
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
    <script>
        // grant file-upload preview onclick functionality
        $('.fileupload-preview').on('click', function () {
            $('.btn-file > input').click();
        });
        $(document).ready(function() {
            var counter = 2;

            $("#addButton").click(function() {
                if (counter > 10) {
                    alert("Chỉ được chọn 10 dịch vụ");
                    return false;
                }

                var new_sv_box = $(document.createElement('div')).attr("id", "sv_box_" + counter).addClass("w3-row-padding sv_image w3-panel w3-border-top w3-border-bottom w3-border-green row");

                // new_sv_box.after().html("<div class='w3-half'><label for=''>Ảnh đại diện</label><input class='w3-input' type='file' name='img_sv_box[]' id='img_sv_box_"+counter+"' ></div><div class='w3-half'><label for='text_sv_box_"+counter+"'>Tên Dịch Vụ</label><input class='w3-input' type='text' name='text_sv_box[]' id='text_sv_box_"+counter+"'></div>");
                new_sv_box.after().html("<div class='w3-half col-md-6 col-sm-6 col-xs-12'><label for=''>Ảnh đại diện</label><input class='w3-input ' type='file' name='img_sv_box[]' id='img_sv_box_"+counter+"' ></div><div class='w3-half col-md-6 col-sm-6 col-xs-12'><label for='text_sv_box_"+counter+"'>Tên Dịch Vụ</label><input class='w3-input form-control' type='text' name='text_sv_box[]' id='text_sv_box_"+counter+"'></div>");

                new_sv_box.appendTo("#sv_box_group");

                $("#sv_counter").val(counter);

                counter ++;

            });

            $("#removeButton").click(function() {
                if(counter==1){
                    alert("No more textbox to remove");
                    return false;
                }
                counter--;

                $("#sv_box_" + counter).remove();
                $("#sv_counter").val(counter - 1);
            });
        });
    </script>
@endsection