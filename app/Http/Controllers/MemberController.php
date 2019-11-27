<?php

namespace App\Http\Controllers;

use App\booksCategory;
use Illuminate\Http\Request;

use App\member;
use Symfony\Component\HttpFoundation\File\File;


class MemberController extends Controller
{

    //Listing the resources
    public function index(){
        $members = member::paginate(4);
        return view('memberLists', compact('members'));
    }
    public function create()
    {
        return view('addMembers');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|min:10|max:14',
            'dept' => 'required',
            'address' => 'required',
            'member_photo' => 'required',
        ],[
            'first_name.required' => __('فیلد نام الزامی است'),
            'last_name.required' => __('فیلد تخلص الزامی است'),
            'email.required' => __('فیلد ایمیل الزامی است'),
            'email.email' => __('فیلد ایمیل باید ایمیل باشد'),
            'contact.required' => __('فیلد شماره تماس الزامی است'),
            'contact.min' => __('فیلد شماره تماس حداقل 10 باشد'),
            'contact.max' => __('فیلد شماره تماس حداکثر 14 باشد'),
            'dept.required' => __('فیلد دیپارتمنت الزامی است'),
            'address.required' => __('فیلد آدرس الزامی است'),
            'member_photo.required' => __('فیلد عکس الزامی است'),
            'member_photo.image' => __('فیلد عکس باید عکس باشد'),
        ]);

        $member = new member();
        $member->first_name = $request->get('first_name');
        $member->last_name = $request->get('last_name');
        $member->email = $request->get('email');
        $member->contact = $request->get('contact');
        $member->dept = $request->get('dept');
        $member->address = $request->get('address');
        $member_photo = time() . '.' . $request->file('member_photo')->getClientOriginalExtension();
        $result = $request->file('member_photo')->move(public_path('img/member_photos'), $member_photo);
        if ($result instanceof File) {
            $member->image_name = $member_photo;
        }
        $member->save();

        return redirect()->route('member.list')->with('success',__('شخص مورد نظر با موفقیت اضافه شد'));
    }


    public function edit($id)
    {
        $member = member::find($id);
        return view('editMembers', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|min:10|max:14',
            'dept' => 'required',
            'address' => 'required',
            'member_photo' => 'required',
        ],[
            'first_name.required' => __('فیلد نام الزامی است'),
            'last_name.required' => __('فیلد تخلص الزامی است'),
            'email.required' => __('فیلد ایمیل الزامی است'),
            'email.email' => __('فیلد ایمیل باید ایمیل باشد'),
            'contact.required' => __('فیلد شماره تماس الزامی است'),
            'contact.min' => __('فیلد شماره تماس حداقل 10 باشد'),
            'contact.max' => __('فیلد شماره تماس حداکثر 14 باشد'),
            'dept.required' => __('فیلد دیپارتمنت الزامی است'),
            'address.required' => __('فیلد آدرس الزامی است'),
            'member_photo.required' => __('فیلد عکس الزامی است'),
            'member_photo.image' => __('فیلد عکس باید عکس باشد'),
        ]);

        $member = member::find($id);
        $member->first_name = $request->get('first_name');
        $member->last_name = $request->get('last_name');
        $member->email = $request->get('email');
        $member->contact = $request->get('contact');
        $member->dept = $request->get('dept');
        $member->address = $request->get('address');
        $member_photo = time() . '.' . $request->file('member_photo')->getClientOriginalExtension();
        $result = $request->file('member_photo')->move(public_path('img/member_photos'), $member_photo);
        if ($result instanceof File) {
            $member->image_name = $member_photo;
        }
        $member->save();

        return redirect()->route('member.list')->with('success',__('شخص مورد نظر با موفقیت ویرایش شد'));
    }

    public function destroy($id)
    {
        $memberItem = member::find($id);
        if ($memberItem && $memberItem instanceof member)
        {
            $memberItem->delete();
            return redirect()->route('member.list')->with('success', __('شخص مورد نظر با موفقیت حذف گردید.'));
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $type = $request->get('type');
        $members = [];

        if ($type == 'dept')
        {
            $members = member::where('dept', 'like', $keyword)->paginate(4);
        } elseif ($type === 'first_name')
        {
            $members = member::where('first_name','like', $keyword)->paginate(4);

        }
        return view('memberLists', compact('members', 'type'));
    }
}
