<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
session_start();


class UserController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getDetail($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.detail')->with('user',$user);
    }

    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $user = User::paginate($view);
        Session::put('view',$view);
        return view('admin.user.list')->with('list_user',$user);
    }

    public function postList(Request $request)
    {
        $view = $request->view;
        $user = User::paginate($view);
        Session::put('view',$view);
        return view('admin.user.list')->with('list_user',$user);
    }

    public function getSearch(Request $request)
    {
        $user = User::all();
        if($request->search == '')
        {
            $view = Session::get('view') ?? 10;
            $user = User::paginate($view);
            Session::put('view',$view);
            return view('admin.user.list')->with('list_user',$user);
        }
        $user = User::where('name','like','%'.$request->search.'%')->get();
        return view('admin.user.list')->with('list_user',$user);
    }

    public function postAdd(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'cmnd' => 'required',
            'phone' => 'required',
            'avatar' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $user = new User();
        $user['name'] = $request->name;
        $user['cmnd'] = $request->cmnd;
        $user['phone'] = $request->phone;
        $user['avatar'] = $request->avatar;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        $user['status'] = $request->status;
        $user->save();
        
        $get_image = $request->file('avatar');
        $id = $user->id;
        if($get_image)
        {
            $new_image = $id.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/avatar_admin',$new_image);
            $user['avatar'] = $new_image;
            $user->save();
        }
        Session::put('message','Thêm Nhân Viên Thành Công');
        return redirect()->route('get-list-admin');
    }

    public function getEditPass($id)
    {
        $user = User::find($id);
        return view('admin.user.edit-password')->with('user',$user);
    }

    public function postEditPass(Request $request)
    {
        $this->Validate($request,
        [
            'new_password' => 'required',
            'confirm_new_password' => 'required',
        ]);

        $user = User::find($request->id);
        if(Hash::check($request->password, $user->password))
        {
            if($request->new_password == $request->confirm_new_password)
            {
                $user->password = Hash::make($request->new_password);
                $user->save();
                Session::put('message','Sửa Mật Khẩu Thành Công');
                return redirect()->back();
            }
            Session::put('message','Sửa Mật Khẩu Thất Bại');
            return redirect()->back();
        }
        Session::put('message','Mật Khẩu Cũ Không Đúng');
        return redirect()->back();
    }

    public function getEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit')->with('admin',$user);
    }

    public function postEdit(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'cmnd' => 'required',
            'phone' => 'required',
            'avatar' => 'required',
        ]);


        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->cmnd = $request->cmnd;
        $user->phone = $request->phone;

        $get_image = $request->file('avatar');
        if($get_image)
        {
            $new_image = $user->id.'.'.$get_image->getClientOriginalExtension();
            unlink(public_path('uploads/avatar_admin/'.$user->avatar));
            $get_image->move('uploads/avatar_admin',$new_image);
            $user->avatar = $new_image;
        }
        $user->save();
        Session::put('message','Sửa Nhân Viên Thành Công');
        return redirect()->route('get-list-admin');
    }

    public function getDelete($id)
    {
        $user = User::findOrFail($id);
        if(is_file(public_path('uploads/avatar_admin/'.$user->avatar)))
        {
            unlink(public_path('uploads/avatar_admin/'.$user->avatar));
        }
        $user->delete();
        Session::put('message','Xóa Nhân Viên Thành Công');
        return redirect()->back();
    }
    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->save();
        Session::put('message','Kích Hoạt Nhân Viên Thành Công');
        return redirect()->back();
    }

    public function unactive($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        Session::put('message','Hủy Kích Hoạt Nhân Viên Thành Công');
        return redirect()->back();
    }

    public function process_all(Request $request)
    {
        $list_adminID = $request->adminID;
        if($list_adminID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_adminID as $id)
                {
                    $this->getDelete($id); 
                }
                Session::put('message','Xóa Nhân Viên Thành Công');
                return redirect()->back();
            }
            else if($request->action == "active")
            {
                foreach($list_adminID as $id)
                {
                    $this->active($id); 
                }
                Session::put('message','Kích Hoạt Nhân Viên Thành Công');
                return redirect()->back();
            }
            else if($request->action == "unactive")
            {
                foreach($list_adminID as $id)
                {
                    $this->unactive($id); 
                }
                Session::put('message','Không Kích Hoạt Nhân Viên Thành Công');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
