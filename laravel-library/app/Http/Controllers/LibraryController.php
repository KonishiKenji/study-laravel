<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Input;

use App\Library;

class LibraryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
      return view('library/libraryHome');

    }

    public function borrowingList()
    {
      return view('library/libraryBorrowingList');

    }

    public function borrowHistory()
    {
      return view('library/libraryBorrowHistory');

    }

}
