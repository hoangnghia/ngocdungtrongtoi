<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Album_image;
use App\Models\Culture;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class CultureController extends Controller
{
    public function index()
    {
        $culture = Culture::all();
        return view('frontend/culture/index', ['culture' => $culture]);
    }
}
