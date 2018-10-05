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

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByRaw('created_at DESC')->paginate(10);
        return view('frontend/news/index', ['news' => $news]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $newsdetail = News::where('id',$id)->first();
        $typenews = News::where('type',$newsdetail->type)->orderByRaw('created_at DESC')->get();
        return view('frontend/news/detail', ['news' => $newsdetail,'newsdetail' =>$typenews]);
    }
}
