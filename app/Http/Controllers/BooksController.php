<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\booksCategory;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::paginate(4);
        $cats = booksCategory::all();
        return view('booksList', compact('books','cats'));
    }

    public function create()
    {

        $cats = booksCategory::all();

        return view('addBooks', compact('cats'));

        //return "Create Function called";
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'edition' => 'required',
            'author_name' => 'required',
            'publisher_name' => 'required',
            'cat' => 'required',
            'totalAvail' => 'required|numeric',
        ], [
            'title.required' => 'عنوان کتاب الزامی است',
            'edition.required' => 'نوبت چاپ کتاب الزامی است',
            'author_name.required' => 'نام نویسنده الزامی است',
            'publisher_name.required' => 'نام انتشارات الزامی است',
            'cat.required' =>'انتخاب کردن کتگوری الزامی است',
            'totalAvail.required' => 'فیلد موجودی الزامی می باشد',
            'totalAvail.numeric' => 'موجودی باید بصورت اعداد باشد',
        ]);
        $book = new Book();
        $book->bookTitle = $request->title;
        $book->edition = $request->edition;
        $book->author_name = $request->author_name;
        $book->publisher_name = $request->publisher_name;
        $book->catId = $request->cat;
        $book->totalAvail = $request->totalAvail;
        $book->save();
        return redirect()->route('book.list')->with('success',__('کتاب جدید با موفقیت اضافه شد'));

    }

    public function edit($id)
    {
        $book = Book::find($id);
        $cats = booksCategory::all();
        return view('editBooks',compact('book', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'edition' => 'required',
            'author_name' => 'required',
            'publisher_name' => 'required',
            'cat' => 'required',
            'totalAvail' => 'required|numeric',
        ], [
            'title.required' => __('عنوان کتاب الزامی است'),
            'edition.required' => __('نوبت چاپ کتاب الزامی است'),
            'author_name.required' => __('نام نویسنده الزامی است'),
            'publisher_name.required' => __('نام انتشارات الزامی است'),
            'cat.required' => __('انتخاب کردن کتگوری الزامی است'),
            'totalAvail.required' => __('فیلد موجودی الزامی می باشد'),
            'totalAvail.numeric' => __('موجودی باید بصورت اعداد باشد'),
        ]);

        $book = Book::find($id);
        $book->bookTitle = $request->get('title');
        $book->edition = $request->get('edition');
        $book->author_name = $request->get('author_name');
        $book->publisher_name = $request->get('publisher_name');
        $book->catId = $request->get('cat');
        $book->totalAvail = $request->get('totalAvail');
        $book->save();
        return redirect()->route('book.list')->with('success', __('کتاب مورد نظر با موفقیت ویرایش شد'));

    }

    public function destroy($id)
    {
        $bookItem = Book::find($id);
        if ($bookItem && $bookItem instanceof Book) {
            $bookItem->delete();
            return redirect()->route('book.list')->with('success', __('کتاب مورد نظر با موفقیت حذف گردید.'));
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $type = $request->get('type');
        $books = [];

        if ($type == 'bookTitle')
        {

            $books = Book::where('bookTitle', 'like', $keyword)->paginate(4);
        } elseif ($type === 'author_name')
        {
            $books = Book::where('author_name','like', $keyword)->paginate(4);

        }
        return view('booksList', compact('books', 'type'));
    }
}
