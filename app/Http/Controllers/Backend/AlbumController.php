<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\User;
use Image;
use App\Models\Album_image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;


class AlbumController extends Controller
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


//        dd($branch);
        return view('album/index');
    }

    /***
     * @return mixed
     * @throws \Exception
     */
    public function getArrayData()
    {
        $post = Album::all();
        $datatables = Datatables::of($post);
        $datatables->addColumn('username', function ($post) {
            if (!is_null($post->userId)) {
                $user = User::where('id', $post->userId)->first();
                return $user->name;
            }
            return '(Not set)';
        });
//        $datatables->addColumn('loai', function ($post) {
//            if (!is_null($post->type)) {
//                $user = \App\Models\Post::where('id', $post->type)->first();
//                return $user->name;
//            }
//            return '(Not set)';
//        });
        return $datatables->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $post = new Album();
//        dd($post->image_url);
        return view('album/create', ['post' => $post]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPort(Request $request)
    {
        $id = Auth::user()->id;
        $image_file = $request->link_image;
        $filename1231 = time() . $image_file->getClientOriginalName();

        $post = new Album();
        $post->title = $request->name;
        $post->description = $request->description;
        $post->image_url = $filename1231;
        $post->userId = $id;
        $post->type = $request->type;
        $post->content = $request->contentpost;
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->save();

        $postId = $post->id;

        $sv_text = $request->text_sv_box;
        $sv_file = $request->file('img_sv_box');
        $args_sv = array();
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
        if (count($sv_file) == count($sv_text) && count($sv_file) != 0) {
            foreach ($sv_file as $key => $sv_image) {
                if (strlen($sv_image) > 0) {
                    $filename = time() . $sv_image->getClientOriginalName();
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
                    Image::make($sv_image->getRealPath())->save($destinationPath);
                    $post_image = new Album_image();
                    $post_image->post_id = $postId;
                    $post_image->image_url = $filename;
                    $post_image->title = $sv_text[$key];
                    $post_image->created_at = Carbon::now();
                    $post_image->updated_at = Carbon::now();
                    $post_image->save();
                }
            }
        }

        Session::flash('flash_message', "Thêm phòng ban thành công");
        return $this->index();
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show dử liệu lên trang edit
     */
    public function editRoom($id = '')
    {


        $room = Room::where('id', $id)->first();

        if (!$room instanceof Room) {
            $room = new Room();
            Session::flash('flash_message_error', "Chi nhánh không tồn tại");
        }
        $branch = Branch::all();
        return view('room/edit', ['room' => $room, 'branch' => $branch]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Xử lý sửa phòng ban
     */
    public function editRoomPost(Request $request)
    {


        $room = Room::where('id', $request->id)->first();
        if ($room instanceof Room) {
            $room->name = $request->name;
            $room->branchid = $request->branch;
            $room->phone = $request->phone;
            $room->note = $request->note;
            $room->updated_at = Carbon::now();
            $room->save();
            Session::flash('flash_message', "Cập nhật thành công");
        } else {
            Session::flash('flash_message_error', "Có lỗi");
        }
        return $this->index();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * xóa phòng ban
     */
    public function delete($id)
    {
        Album::where('id', '=', $id)->delete();
        Album_image::where('post_id', '=', $id)->delete();
        Session::flash('flash_message', "Xóa  thành công");
        return $this->index();
    }
}
