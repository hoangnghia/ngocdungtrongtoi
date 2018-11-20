@extends('layouts.appadmin')

@section('content')
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-icon">
                <a href="{{url('/branch')}}">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Danh sách chi nhánh</li>
        </ol>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @if (session('flash_message'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('flash_message') }}
                </div>
            @endif
            @if (session('flash_message_error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('flash_message_error') }}
                </div>
            @endif
            <div class="x_title">
                <h2>Danh sách chi nhánh</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thêm
                        </button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatablebranch" class=" table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Tên nhân viên</th>
                            <th class="column-title">Số điện thoại</th>
                            <th class="column-title">Địa chỉ</th>
                            <th class="column-title">Phòng ban</th>
                            <th class="column-title">Group</th>
                            <th class="column-title">Ngày tạo</th>
                            <th class="column-title">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm nhân viên</h4>
                </div>
                <div class="modal-body">
                    <div id="formActioncheck" class="alert alert-danger formActioncheck" style="display: none"></div>
                    <form method="POST" action="/user/postUser" id="reused_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">
                                Họ tên:</label>
                            <input type="text" class="form-control"
                                   id="name" name="name" required maxlength="50" value="">
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                Số điện thoại:</label>
                            <input type="number" class="form-control"
                                   id="phone" name="phone" required maxlength="50" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email:</label>
                            <input type="email" class="form-control"
                                   id="email" name="email" required value="">
                        </div>
                        <div class="form-group">
                            <label for="address">
                                Địa chỉ:</label>
                            <input type="text" class="form-control"
                                   id="address" name="address" required maxlength="50" value="">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-adn"></i>
                            </div>
                            <select id="room" name="room" class="form-control input-md">
                                <option value="">Chọn
                                    phòng ban
                                </option>
                                @foreach(\App\Models\User::GROUP_ROOM as $key => $item)
                                    <option value="{{$key}}">
                                        {{$item}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-adn"></i>
                            </div>
                            <select id="group" name="group" class="form-control input-md">
                                <option value="">Chọn
                                    quyền
                                </option>
                                @foreach(\App\Models\User::GROUP_LEVEL as $key => $item)
                                    <option value="{{$key}}">
                                        {{$item}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn btn-lg btn-success btn-block" data-dismiss="modal">Hủy</button>
                        <button id="action-form" type="button" class="btn btn-lg btn-success btn-block" value="Lưu lại">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var datatablebranch = $('#datatablebranch').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(url('/user/getUser')); ?>",
                "columns": [
                    {
                        data: 'id', name: 'id', render: function (data) {
                            return '  <input type="checkbox" class="flat" value="' + data + '" name="table_records">';
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'address', name: 'address'},
                    {data: 'roomid', name: 'roomid'},
                    {data: 'levelid', name: 'levelid'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'status', name: 'status', render: function (data) {
                            return data == 1 ? '<span style="color:green;"">Active</span>' : '<span style="color:red;" >No active</span>'
                        }
                    },
                ]
            });

            /**
             * Ajax loading error logs when user import data with form
             */
            $("#action-form").on('click', function (e) {
                e.preventDefault();
                $("#action-form").attr("disabled", true);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/user/postUser') }}",
                    dataType: 'json',
                    method: 'post',
                    data: {
                        name: $("#name").val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        address: $("#address").val(),
                        room: $("#room").val(),
                        group: $("#group").val(),
                    },
                    success: function (data) {
                        if (data.result != undefined) {
                            datatablebranch.draw(false);
                            /**
                             *  Set value input null
                             **/
                            $("#name").val('');
                            $('#email').val('');
                            $('#phone').val('');
                            $("#address").val('');
                            $("#room").val('');
                            $("#group").val('');
                            $("#action-form").attr("disabled", false);

                            $('#myImportFormModal').modal('hide');
                        } else {
                            $.each(data.errors, function (key, value) {
                                console.log(value);
                                $('.formActioncheck').show();
                                $('.formActioncheck').append('<p>' + value + '</p>');
                                setTimeout(function () {
                                    $('.formActioncheck').empty();
                                    $('.formActioncheck').hide(500);
                                    $("#action-form").attr("disabled", false);
                                }, 2500);
                            });
                        }
                    }
                });
            });

        });
    </script>
@endsection
