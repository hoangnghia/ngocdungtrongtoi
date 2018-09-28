<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
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
        return view('branch/index');
    }


    public function getArrayData()
    {
        $branch = Branch::select();
        return DataTables::of($branch)
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createBranch(Request $request)
    {

        $check = Branch::where('name', $request->name)->count();
        if ($check != 0) {
            Session::flash('flash_message_error', "Hi ! chi nhánh đã tồn tại trong hệ thống");
            return redirect('/branches');
        }
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->note = $request->note;
        $branch->created_at = Carbon::now();
        $branch->updated_at = Carbon::now();
        $branch->save();
        Session::flash('flash_message', "Thêm chi nhánh thành công");
        return view('branch/index');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show dử liệu lên trang edit
     */
    public function editBranch($id = '')
    {

        $branch = Branch::where('id', $id)->first();
        if (!$branch instanceof Branch) {
            $branch = new Branch();
            Session::flash('flash_message_error', "Chi nhánh không tồn tại");
        }
        return view('branch/edit', ['branch' => $branch]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Xử lý sửa chi nhánh
     */
    public function editBranchPost(Request $request)
    {
        $branch = Branch::where('id', $request->id)->first();

        if ($branch instanceof Branch) {
            $branch->name = $request->name;
            $branch->address = $request->address;
            $branch->phone = $request->phone;
            $branch->note = $request->note;
            $branch->updated_at = Carbon::now();
            $branch->save();
            Session::flash('flash_message', "Cập nhật thành công");
        } else {
            Session::flash('flash_message_error', "co loi");
        }
        return view('branch/index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * xóa chi nhánh
     */
    public function delete($id)
    {
        Branch::where('id', '=', $id)->delete();
        Session::flash('flash_message', "Xóa  thành công");
        return view('branch/index');
    }
}
