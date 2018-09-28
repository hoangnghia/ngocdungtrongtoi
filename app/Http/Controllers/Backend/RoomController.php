<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class RoomController extends Controller
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

        $branch = Branch::all();
//        dd($branch);
        return view('room/index', ['branch' => $branch]);
    }

    /***
     * @return mixed
     * @throws \Exception
     */
    public function getArrayData()
    {
        $room = Room::all();
        $datatables = Datatables::of($room)  ;
        $datatables->addColumn('branch_id', function ($room) {
            if(!is_null($room->branchid)){
                $branch = Branch::where('id', $room->branchid)->first();
                return $branch->name;
            }
            return '(Not set)';
        });
        return $datatables->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createRoom(Request $request)
    {

        $check = Room::where('name', $request->name)->count();
        if ($check != 0) {
            Session::flash('flash_message_error', "Hi ! phòng ban đã tồn tại trong hệ thống");
            return redirect('/branches');
        }
        $room = new Room();
        $room->name = $request->name;
        $room->branchid = $request->branch;
        $room->phone = $request->phone;
        $room->note = $request->note;
        $room->created_at = Carbon::now();
        $room->updated_at = Carbon::now();
        $room->save();
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
        return view('room/edit', ['room' => $room,'branch' => $branch]);
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
        Room::where('id', '=', $id)->delete();
        Session::flash('flash_message', "Xóa  thành công");
        return $this->index();
    }
}
