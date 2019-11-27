<?php

namespace App\Http\Controllers;

use App\Book;
use App\member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\File\File;

class UserController extends Controller
{
    public function index()
    {
        $admin = User::all();
        return view('admin', compact('admin'));
    }
    public function home()
    {
        if (Auth::check())
        {
            $admin = User::all();
            $book = Book::all();
            $member = member::all();
            return view('main',compact('admin','book', 'member'));
        } else {
            return redirect()->route('login');
        }
    }
    public function create()
    {
        return view('add_admin');
    }
    

    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'admin_photo' => 'required|image',
        ],[
            'first_name.required' => __('فیلد نام مدیر الزامی است'),
            'last_name.required' => __('فیلد تخلص الزامی است'),
            'username.required' => __('فیلد نام کاربری الزامی است'),
            'password.required' => __('رمز عبور الزامی است'),
            'admin_photo.required' => __('فیلد عکس مدیر الزامی است'),
            'admin_photo.image' => __('فیلد عکس باید عکس باشد'),
        ]);

        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['username'] = $request->input('username');
        $data['password'] = bcrypt($request->input('password'));
        $admin_photo = time() . '.' . $request->file('admin_photo')->getClientOriginalExtension();
        $result = $request->file('admin_photo')->move(public_path('img/admin_photos'), $admin_photo);
        if ($result instanceof File) {
            $data['image_name'] = $admin_photo;
        }

        $admin = new User();
        $admin->first_name = $data["first_name"];
        $admin->last_name = $data["last_name"];
        $admin->username = $data["username"];
        $admin->password = $data["password"];
        $admin->image_name = $data['image_name'];
        $admin->save();

        return redirect()->route('admin.list', compact('admin'))->with('success', __('مدیر جدید با موفقیت اضافه شد'));
    }


    public function destroy($id)
    {
        if ($id) {
            $adminItem = User::find($id);
            if ($adminItem && $adminItem instanceof User) {
                $adminItem->delete();
                return redirect()->route('admin.list')->with('success', __('مدیر مورد نظر با موفقیت حذف گردید.'));
            }
        }
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function dologin(Request $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')]))
        {
            return redirect()->route('home');
        }
        return redirect()->back()->with('loginError', __('ایمیل یا کلمه عبور اشتباه می باشد'));
    }

//    Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

//    Profile
    public function profile()
    {
        return view('profile');
    }

    public function profile_update(Request $request)
    {
        $data = [
            'first_name' =>  $request->input('first_name'),
            'last_name' =>  $request->input('last_name'),
            'username' =>  $request->input('username'),
            'password' =>  bcrypt($request->input('password')),
        ];

        if (!$request->file('admin_photo'))
        {
            $data['image_name'] = Auth::user()->image_name;
            $admin = User::find(Auth::user()->id);
            if ($admin)
            {
                $admin = User::find(Auth::user()->id);;
                $admin->first_name = $data['first_name'];
                $admin->last_name = $data['last_name'];
                $admin->username = $data['username'];
                $admin->password = $data['password'];
                $admin->image_name = $data['image_name'];
                $admin->save();
            }
            return redirect()->back()->with('success', __('کاربر مورد نظر با موفقیت ویرایش شد.'));
        } else{
            $admin_photo = time().'.'.$request->file('admin_photo')->getClientOriginalExtension();
            $result = $request->file('admin_photo')->move(public_path('img/admin_photos'), $admin_photo);
            if ($result instanceof File) {
                $data['image_name'] = $admin_photo;
            }

            $admin = User::find(Auth::user()->id);;
            $admin->first_name = $data['first_name'];
            $admin->last_name = $data['last_name'];
            $admin->username = $data['username'];
            $admin->password = $data['password'];
            $admin->image_name = $data['image_name'];
            $admin->save();
            return redirect()->back()->with('success', __('کاربر مورد نظر با موفقیت ویرایش شد.'));

        }
    }

    public function about()
    {
        return view('about_us');
    }

    public function changeLanguage(Request $request)
    {
        $lang = $request->language;

        Session(['locale' => $lang]);
        return redirect()->back();
    }
}
