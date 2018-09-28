<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;


class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video/index');
    }

    /***
     * @return mixed
     * @throws \Exception
     */
    public function getArrayData()
    {
        $post = Video::all();
        $datatables = Datatables::of($post);
        $datatables->addColumn('username', function ($post) {
            if (!is_null($post->userId)) {
                $user = User::where('id', $post->userId)->first();
                return $user->name;
            }
            return '(Not set)';
        });
        return $datatables->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('video/create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPort(Request $request)
    {

        $image_file = $request->link_image;

        if (strlen($image_file) > 0) {
            $filename = time() . $image_file->getClientOriginalName();
            $diryear = 'public/uploads/';
            $dir = 'public/uploads/';
            if (file_exists($diryear) && is_dir($diryear)) {
                if (!file_exists($dir) && !is_dir($dir)) {
                    die('sss');
                    mkdir($dir, 0777, true);
                }
            } else {
                mkdir($diryear, 0777, true);
            }
            $destinationPath = $dir . '/' . $filename;
            Image::make($image_file->getRealPath())->resize(350, 230)->save($destinationPath);
            $id = Auth::user()->id;
            $video = new Video();
            $video->title = $request->title;
            $video->description = $request->description;
            $video->type = $request->type;
            $video->userId = $id;
            $video->content = $request->contentpost;
            $video->url_video = $request->urlvideo;
            $video->img_url = $filename;
            $video->created_at = Carbon::now();
            $video->updated_at = Carbon::now();
            $video->save();
        }
        Session::flash('flash_message', "Thêm phòng ban thành công");
        return $this->index();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * xóa phòng ban
     */
    public function delete($id)
    {
        Video::where('id', '=', $id)->delete();
        Session::flash('flash_message', "Xóa  thành công");
        return $this->index();
    }


    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show dử liệu lên trang edit
     */
    public function editVideo($id = '')
    {

        $video = Video::where('id', $id)->first();

        if (!$video instanceof Video) {
            $video = new Video();
            Session::flash('flash_message_error', "video không tồn tại");
        }
        return view('video/edit', ['video' => $video]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Xử lý sửa phòng ban
     */
    public function editVideoPost(Request $request)
    {
        $image_file = $request->link_image;
        if (strlen($image_file) > 0) {
            $filename = time() . $image_file->getClientOriginalName();
            $diryear = 'public/uploads/';
            $dir = 'public/uploads/';
            if (file_exists($diryear) && is_dir($diryear)) {
                if (!file_exists($dir) && !is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
            } else {
                mkdir($diryear, 0777, true);
            }
            $destinationPath = $dir . '/' . $filename;
            Image::make($image_file->getRealPath())->save($destinationPath);
        }
        $id = Auth::user()->id;
        $video = Video::where('id', $request->id)->first();

        if ($video instanceof Video) {
            $video->title = $request->title;
            $video->description = $request->description;
            $video->type = $request->type;
            $video->userId = $id;
            $video->content = $request->contentpost;
            $video->url_video = $request->urlvideo;
            if (strlen($image_file) > 0) {
                $video->img_url = $filename;
            }
            $video->created_at = Carbon::now();
            $video->updated_at = Carbon::now();
            $video->save();
            Session::flash('flash_message', "Cập nhật thành công");
        } else {
            Session::flash('flash_message_error', "Có lỗi");
        }
        return $this->index();
    }
}
