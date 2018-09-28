<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Album_image;
use App\Models\News;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        $type = 4;
        $video = Video::where('type', $type)->get();
        $image = Album::all();
        $listvideo = Video::all();
        $news = News::all();
        return view('frontend/home/index', ['video' => $video, 'album' => $image,'listvideo'=>$listvideo,'news' =>$news]);
    }

    public function getiImagesByAlbum(Request $request)
    {
        $image = Album_image::where('post_id', $request->id)->get();
        return json_encode([
            'data' => $image,
            'result' => true,
        ]);

    }
}
