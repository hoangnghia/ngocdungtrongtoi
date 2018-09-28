<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;


class NewsController extends Controller
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
        return view('news/index');
    }

    /***
     * @return mixed
     * @throws \Exception
     */
    public function getArrayData()
    {
        $post = News::all();
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
        $post = new News();
        return view('news/create', ['post' => $post]);
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

        $post = new News();
        $post->title = $request->name;
        $post->description = $request->description;
        $post->image_url = $filename1231;
        $post->userId = $id;
        $post->type = $request->type;
        $post->content = $request->contentpost;
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->save();
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
            Image::make($image_file->getRealPath())->resize(350, 230)->save($destinationPath);
        }
        Session::flash('flash_message', "Thêm bài viết thành công");
        return $this->index();
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show dử liệu lên trang edit
     */
    public function editNews($id = '')
    {

        $news = News::where('id', $id)->first();
        if (!$news instanceof $news) {
            $news = new News();
            Session::flash('flash_message_error', "Bài viết không tồn tại");
        }
//        dd($news);

        return view('news/edit', ['news' => $news]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Xử lý sửa phòng ban
     */
    public function editNewsPost(Request $request)
    {

        $news = News::where('id', $request->id)->first();
        if ($news instanceof News) {
            $news->name = $request->name;
            $news->branchid = $request->branch;
            $news->phone = $request->phone;
            $news->note = $request->note;
            $news->updated_at = Carbon::now();
            $news->save();
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
        News::where('id', '=', $id)->delete();
        Session::flash('flash_message', "Xóa  thành công");
        return $this->index();
    }
}
