<?php

namespace App\Http\Controllers;

use App\booksCategory;
use Illuminate\Http\Request;

class BooksCategoryController extends Controller
{

    public function index()
    {
        $cats = booksCategory::paginate(6);
        return view('category_list', compact('cats'));
    }

    public function create()
    {
        return view('addCategories');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => __('نام کتگوری الزامی می باشد')
        ]);
        $cat = new booksCategory;

        $cat->catName = $request->name;

        $cat->save();

        return redirect()->route('category.list')->with('catSuccess',__('کتگوری جدید با موفقیت اضافه شد'));
    }


    public function edit($id)
    {
        $cat = booksCategory::find($id);
        return view('editCategories',compact('cat'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => __('نام کتگوری الزامی می باشد')
        ]);
        $cat = booksCategory::find($id);
        $cat->catName = $request->get('name');
        $cat->save();
        return redirect()->route('category.list')->with('catSuccess', __('کتگوری مورد نظر با موفقیت ویرایش شد'));
    }

    public function destroy($id)
    {
        $catItem = booksCategory::find($id);
        if ($catItem && $catItem instanceof booksCategory) {
            $catItem->delete();
            return redirect()->route('category.list')->with('catSuccess', __('کتگوری مورد نظر با موفقیت حذف گردید.'));
        }
    }
}
