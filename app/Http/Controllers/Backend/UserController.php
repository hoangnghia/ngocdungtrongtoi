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
use function PHPSTORM_META\elementType;
use Yajra\DataTables\DataTables;

/**
 * Class CareSoftController
 * @package App\Http\Controllers\Dashboard
 */
class UserController extends Controller
{

    /**
     * Return all phones
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user/index');
    }

    /**
     * Return all phones
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArrayUser()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $user = DB::table('user as u')
            ->where('status', "1")
            ->orderBy('j.created_at', 'desc');
        $datatables = DataTables::of($user);
        return $datatables->make(true);
    }

    /**
     * Validate form and save data to db
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postUser(Request $request)
    {
        if(isset($request))
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->room = $request->room;
            $user->group = $request->group;
            $user->created_at = Carbon::now();
            $user->updated_at = Carbon::now();
            $user->save();
            return response()->json(['result' => true, 'customer_affiliate' => $user]);
        }else{
            return response()->json(['errors' => ["Thêm user không  thành công"]]);
        }
    }

    /**
     * Update user
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function update($id = '')
    {
        $user = User::where('id', $id)->first();
        if (!$user instanceof User) {
            $user = new User();
            Session::flash('flash_message_error', "Người dùng không tồn tại");
        }
        $user->password = '';
        return view('user/edit', ['user' => $user]);

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function create()
    {

        $user = new User();
        return view('user/edit', ['user' => $user]);
    }

}
