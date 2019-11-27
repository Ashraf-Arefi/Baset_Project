<?php

namespace App\Http\Controllers;

use App\Book;
use App\booksCategory;
use App\member;
use Illuminate\Http\Request;
use App\booksIssued;

class BooksIssuedController extends Controller
{

    public function index()
    {
        $books = booksIssued::paginate(4);
        return view('issuedBooks', compact('books'));
    }


    public function create()
    {
        $books = Book::all();
        $members = member::all();
        return view('issueBooks',compact('books','members'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'memId' => 'required',
            'bookId' => 'required',
            'issueDate' => 'required',
            'returnDate' => 'required',
        ],[
            'memId.required' => __('انتخاب شخص مورد نظر الزامی است'),
            'bookId.required' => __('کتاب مورد نظر الزامی است'),
            'issueDate.required' => __('تاریخ گرفتن کتاب الزامی است'),
            'returnDate.required' => __('تاریخ برگشت الزامی است'),
        ]);
        $issue = new booksIssued();
        $issue->memId = $request->get('memId');
        $issue->bookId = $request->get('bookId');
        $issue->issueDate = $request->get('issueDate');
        $issue->returnDate = $request->get('returnDate');
        $issue->save();

        return redirect()->route('issue.list')->with('success',__('کار خواسته شده با موقیت اضافه شد'));
    }

    public function edit($id)
    {
        $issue = booksIssued::find($id);
        $books = Book::all();
        $members = member::all();
        return view('editIssueBooks',compact('issue','books','members'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'memId' => 'required',
            'bookId' => 'required',
            'issueDate' => 'required',
            'returnDate' => 'required',
        ],[
            'memId.required' => __('انتخاب شخص مورد نظر الزامی است'),
            'bookId.required' => __('کتاب مورد نظر الزامی است'),
            'issueDate.required' => __('تاریخ گرفتن کتاب الزامی است'),
            'returnDate.required' => __('تاریخ برگشت الزامی است'),
        ]);

        $issue = booksIssued::find($id);
        $issue->memId = $request->get('memId');
        $issue->bookId = $request->get('bookId');
        $issue->issueDate = $request->get('issueDate');
        $issue->returnDate = $request->get('returnDate');
        $issue->save();

        return redirect()->route('issue.list')->with('success',__('کار خواسته شده با موقیت اضافه شد'));
    }

    public function destroy($id)
    {
        $issue = booksIssued::find($id);
        if ($issue && $issue instanceof booksIssued)
        {
            $issue->delete();
            return redirect()->route('issue.list')->with('success',__('حذف با موفقیت انجام شد'));
        }
    }
}
