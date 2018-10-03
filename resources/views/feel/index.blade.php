@extends('layouts.appadmin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-icon">
                    <a href="{{url('/news')}}">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="crumb-trail">Danh sách cảm nhận</li>
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
                <h2>Danh sách bài viết</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="dropdown">
                        <a  class="btn btn-primary" href="{{url('/feel/create')}}" >Thêm cảm nhận</a>
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
                            <th class="column-title">Tiêu đề</th>
                            <th class="column-title">Miêu tả</th>
                            <th class="column-title">Người tạo</th>
                            {{--<th class="column-title">Loại</th>--}}
                            <th class="column-title">Ngày tạo</th>
                            <th class="column-title">Trạng thái</th>
                            <th class="column-title">Tùy chỉnh</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#datatablebranch").dataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(url('/feel/getArrayData')); ?>",
                "columns": [
                    {
                        data: 'id', name: 'id', render: function (data) {
                            return '  <input type="checkbox" class="flat" value="'+data+'" name="table_records">';
                        }
                    },
                    {data: 'title', name: 'title'},
                    {data: 'description', name: 'description'},
                    {data: 'username', name: 'username'},
                    {data: 'created_at', name: 'created_at'},
                    {
                        data: 'status',  name: 'status', render: function (data) {
                            return data == 1 ? '<span style="color:green;"">Active</span>' : '<span style="color:red;" >No active</span>'
                        }
                    },
                    {
                        data: 'id',  name: 'option', render: function (data) {
                            return '<ul class="nav navbar-right panel_toolbox"><li class="dropdown"><a href="/news/edit/' + data + '" class="dropdown-toggle" ><i class="fa fa-wrench"></i></a></li><li><a href="/news/delete/'+ data +'" class="close-link" value="'+data+'"><i class="fa fa-close"></i></a></li>'
                        }
                    }

                ]
            });
        });
    </script>
@endsection
