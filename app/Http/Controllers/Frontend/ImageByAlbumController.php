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

class ImageByAlbumController extends Controller
{
    public function index()
    {
        $image = Album::all();
        return view('frontend/album/index', ['album' => $image]);
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
