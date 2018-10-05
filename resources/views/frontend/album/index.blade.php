@extends('layouts.appfrontend')
@section('styles')
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/customstyle.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="txt_about_us">
                <h2>Hình Ảnh Hoạt Động</h2>
                <div class="flower">
                    <img src="\public\uploads\flower.png" alt="flower">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page">
                <div class="page__demo">
                    <div class="page__container">
                        @foreach($album as $item)
                            <div class="col-lg-3 photobox photobox_type11" data-id="{{$item->id}}" data-toggle="modal" data-target="#getCodeModal">
                                <div class="photobox__previewbox">
                                    <img src="\public\uploads\{{$item->image_url}}" class="photobox__preview"
                                         alt="Preview">
                                    <span class="photobox__label">{{$out = strlen($item->description) > 100 ? substr($item->description,0,100)."..." : $item->description}}</span>
                                    <div class="title">
                                        <div>
                                            <h5>{{$item->title}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $album->links()}}
                </div>
            </div>
        </div>
    {{--Modal--}}
    <!-- Modal -->
        <div id="getCodeModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner item-album">
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra_scripts')
    <script>
        /* Demo purposes only */
        $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
        );
        // chi tiet image
        $(".photobox_type11 ").click(function () {
            var album_id = $(this).data('id');
            // TODO: Call ajax get image from alubm ID
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax("<?php echo e(url('/image/get')); ?>", {
                type: 'POST',
                dataType: 'json',
                data: {id: album_id},
                success: function (response) {
                    var html = '';
                    var i;
                    for (i = 0; i < response.data.length; ++i) {
                        var image_url = response.data[i].image_url;
                        var title = response.data[i].title;
                        var isFirst = i == 0 ? 'active' : '';
                        html += '<div class="carousel-item '+isFirst+'"> <img class="d-block w-100" src="/public/uploads/'+image_url+'" alt="'+title+'"><h3>'+title+'</h3> </div>';
                    }
                    $('.item-album').html(html);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });
    </script>
@endsection

