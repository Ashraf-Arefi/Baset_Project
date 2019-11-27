<?php

namespace App\Http\Controllers;

use App\Book;
use App\booksIssued;
use App\booksReturned;
use App\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksReturnedController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $members = member::all();
        $books = Book::all();
        return view('returnBooks',compact('members','books'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'memId' => 'required',
            'bookId' => 'required',
            'returnDate' => 'required',
        ],[
            'memId.required' => __('انتخاب نام شخص الزامی است'),
            'bookId.required' => __('انتخاب کتاب مورد نظر الزامی است'),
            'returnDate.required' => __('تاریخ برگشت الزامی است'),
        ]);
        $returnBook = new booksReturned();
        $returnBook->memId = $request->get('memId');
        $returnBook->bookId = $request->get('bookId');
        $returnBook->returnDate = $request->get('returnDate');
        $returnB = $returnBook->save();
        if ($returnB)
        {
            $issuedBook = DB::collection('book_issueds')->where('memId','=',$returnBook->memId)
                ->where('bookId','=',$returnBook->bookId);
            $issuedBook->delete();
            return redirect()->route('issue.list')->with('success',__('کتاب مورد نظر تحویل داده شد'));
        }
    }

}
