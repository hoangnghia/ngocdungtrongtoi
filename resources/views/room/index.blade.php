@extends('layouts.appadmin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-icon">
                    <a href="{{url('/home')}}">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="crumb-trail">Danh sách phòng ban</li>
            </ol>
        </div>
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
                <h2>Danh sách phong ban</h2>
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
                            <th class="column-title">Tên phòng ban</th>
                            <th class="column-title">Số điện thoại</th>
                            <th class="column-title">Chi nhánh</th>
                            <th class="column-title">Ghi chú</th>
                            <th class="column-title">Ngày tạo</th>
                            <th class="column-title">Status</th>
                            <th class="column-title">Option</th>
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
                    <h4 class="modal-title">Thêm phòng ban</h4>
                </div>
                <div class="modal-body">
                    <form method="POST"  action="{{url('room/create')}}" id="reused_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">
                                Tên phòng ban:</label>
                            <input type="text" class="form-control"
                                   id="name" name="name" required maxlength="50" value="">
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Số điện thoại:</label>
                            <input type="text" class="form-control"
                                   id="name" name="phone" required maxlength="50" value="">
                        </div>
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Chi nhánh</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="branch">
                                    <option>Chọn chi nhánh</option>
                                    @foreach($branch as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Ghi chú:</label>
                            <textarea class="form-control" type="textarea" name="note"
                                      id="describe" placeholder="Your describe Here"
                                      maxlength="6000" rows="7" value=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Tạo mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#datatablebranch").dataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(url('/room/getArrayData')); ?>",
                "columns": [
                    {
                        data: 'id', name: 'id', render: function (data) {
                            return '  <input type="checkbox" class="flat" value="'+data+'" name="table_records">';
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'branch_id', name: 'branch_id'},
                    {
                        data: 'note', name: 'note', render: function (data) {
                            return data != null ? '<span style="color:green;"">'+data+'</span>' : '<span style="color:green" >Không có</span>'
                        }
                    },
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'status',  name: 'status', render: function (data) {
                            return data == 1 ? '<span style="color:green;"">Active</span>' : '<span style="color:red;" >No active</span>'
                        }
                    },
                    {
                        data: 'id',  name: 'option', render: function (data) {
                            return '<ul class="nav navbar-right panel_toolbox"><li class="dropdown"><a href="/room/edit/' + data + '" class="dropdown-toggle" ><i class="fa fa-wrench"></i></a></li><li><a href="/room/delete/'+ data +'" class="close-link" value="'+data+'"><i class="fa fa-close"></i></a></li>'
                        }
                    }

                ]
            });
        });
    </script>
@endsection
