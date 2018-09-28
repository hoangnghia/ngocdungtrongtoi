<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Album_image;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class GetByVideosController extends Controller
{
    public function index()
    {
        $video = Video::all();
        return view('frontend/video/index', ['video' => $video]);
    }

    public function detail($id)
    {
        $videodetail = Video::where('id',$id)->first();
        $typevideo = Video::where('type',$videodetail->type)->orderByRaw('created_at DESC')->get();
        return view('frontend/video/detail', ['video' => $videodetail,'videodetail' =>$typevideo]);
    }

}
