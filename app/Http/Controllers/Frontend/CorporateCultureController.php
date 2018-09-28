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

class CorporateCultureController extends Controller
{
    public function index()
    {
        $type = 4;
        $video = Video::where('type', $type)->get();
        $image = Album::all();
        return view('frontend/home/index', ['video' => $video, 'album' => $image]);
    }
}
