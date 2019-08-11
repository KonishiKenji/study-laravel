<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Auth;
use Response; //Response::makeのため

use App\Books;
use App\Rent_logs;
use App\Users;

class BooksController extends Controller
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

    public function index(Request $request)
    {
      // 現在認証されているユーザーの取得
      $userId = Auth::id();
      $userName = Auth::user()->name;
      $rentInfo = Rent_logs::select(
                              'books.id'
                             ,'books.name'
                             ,'books.status'
                             ,'rent_logs.rent_user_id'
                             )
                             ->RIGHTJOIN('books','books.id','=','rent_logs.book_id')
                             ->ORDERBY('books.id')->get();

      // ソート・検索機能で、どのテーブルから情報を取得するか（下準備）
      $book = DB::TABLE('books');

// ソート機能 =====================================================
      // // IDでのソート機能
      // if($request->orderById){
      //   $book->orderBy('id',$request->orderById);
      //   $orderById = $request->orderById;
      // }
      // else{
      //   $books = Books::all();
      //   $orderById =  'asc';
      // }
      //
      // //本名でのソート機能
      // if($request->orderByBookName){
      //   $book->orderBy('name',$request->orderByBookName);
      //   $orderByBookName = $request->orderByBookName;
      // }
      // else{
      //   // $books = Books::all();
      //   $orderByBookName = 'asc';
      // }
      //
      // // 貸出状態でのソート機能
      // if($request->orderByStatus){
      //   $book->orderBy('status',$request->orderByStatus);
      //   $orderByStatus = $request->orderByStatus;
      // }
      // else{
      //   // $books = Books::all();
      //   $orderByStatus = 'asc';
      // }

// 検索機能 =====================================================
      // // IDでの検索機能
      // if ($request->forSearchName) {
      //   // [ add] 部分一致対応
      //   $book->where('name','like','%'.$request->forSearchName.'%');
      //   // [/add] 部分一致対応
      // }
      //
      // // 本名での検索機能
      // if ($request->forSearchMinPrice) {
      //   $book->where('price','>=',$request->forSearchMinPrice);
      // }
      //
      // // 貸出状態での検索機能
      // if ($request->forSearchMaxPrice) {
      //   $book->where('price','<=',$request->forSearchMaxPrice);
      // }
      // if ($request->searchStock != "noSelect") {
      //   if ($request->searchStock == "min30") {
      //     $stockCondition = 30;
      //   }
      //   elseif ($request->searchStock == "min50") {
      //     $stockCondition = 50;
      //   }
      //   elseif ($request->searchStock == "min100") {
      //     $stockCondition = 100;
      //   }
      //   elseif ($request->searchStock == "min300") {
      //     $stockCondition = 300;
      //   }
      //   $book->where('stock','<',$stockCondition);
      // }
      // else {
      //   $stockCondition = 0;
      //   $book->where('stock','>',$stockCondition);
      // }
      //
      // if ($request->forSearchMakerName) {
      //   $makerName = $makersInfo[$request->forSearchMakerName-1]->maker;
      //   $book->where('maker',$makerName);
      // }

      // [add]最終的にどの条件でテーブルからGETするか確定させる
      $books = $book->get();
      // [/add]最終的にどの条件でテーブルからGETするか確定させる

      // test return
      // return view('library-old/libraryHome');
      // return view('library/libraryHome');
      // return $rentInfo;
      return view('library/libraryHome', ["books" => $books
                                         ,'userId'=>$userId
                                         ,'userName'=>$userName
                                        // ,'orderById'=>$orderById
                                        // ,'orderByName'=>$orderByName
                                        // ,'orderByStatus'=>$orderByStatus
                                         // ,'booksInfo' => $booksInfo
                                         ,'rentInfo' => $rentInfo
                                      ]);

    }

    public function borrowingList()
    {
      $booksInfo = Books::all();
      $rentsInfo = Rent_logs::all();
      //
      // $borrowingListsInfo = Rent_logs::select()
      //                           ->join('books','rent_logs.book_id','=','books.id')
      //                           ->join('users','rent_logs.rent_user_id','=','users.id')
      //                           ->get();
      //
      // $user = Auth::user()->name;
      $userId = Auth::id();

      $borrowingListsInfo = Rent_logs::select(
                                        'rent_logs.id AS id'
                                       ,'books.name AS title'
                                       ,'rent_logs.borrow_date'
                                       ,'books.status'
                                       ,'books.id AS bookId'
                                       // ,'users.name AS rent_user'
                                       )
                                 // ->where('users.name','=',$user)
                                 // ->where('books.status','=',1)
                                        ->where('users.id','=',$userId)
                                        ->where('rent_logs.return_date','=',NULL)
                                        ->join('books','books.id','=','rent_logs.book_id')
                                        ->join('users','users.id','=','rent_logs.rent_user_id')
                                        ->get();

      // $borrowingListsInfo = DB::TABLE('rent_logs')
      //                           ->selectRaw(
      //                             'books.id, MAX("rent_logs.") AS role_cnt')
      //                           ->select(
      //                                   'books.id AS bookId'
      //                                  // ,'rent_logs.id AS id'
      //                                  ,'books.name AS title'
      //                                  ,'rent_logs.borrow_date'
      //                                  ,'books.status'
      //                                  )
      //                           // ->max('rent_logs.borrow_date')
      //                           ->groupby('book.id')
      //                           ->where('users.name','=',$user)
      //                           ->where('books.status','=',1)
      //                           ->join('books','books.id','=','rent_logs.book_id')
      //                           ->join('users','users.id','=','rent_logs.rent_user_id')
      //                           // ->groupBy('books.id')
      //                           ->get();


      // ソート・検索機能で、どのテーブルから情報を取得するか（下準備）
      $book = DB::TABLE('books');
      $rent = DB::TABLE('rent_logs');

      // 最終的にどの条件でテーブルからGETするか確定させる
      $books = $book->get();
      $rents = $rent->get();

      return view('library/libraryBorrowingList', ["books" => $books
                                                  ,'rents' => $rents
                                                  // ,'orderById'=>$orderById
                                                  // ,'orderByName'=>$orderByName
                                                  // ,'orderByPrice'=>$orderByPrice
                                                  // ,'orderByStock'=>$orderByStock
                                                  // ,'orderByMaker'=>$orderByMaker
                                                  ,'booksInfo' => $booksInfo
                                                  ,'rentsInfo' => $rentsInfo
                                                  ,'borrowingListsInfo' => $borrowingListsInfo
                                                  // ,'user' => $user
                                      ]);

    }

    public function bookSignUp()
    {
      // 画面が開かれそうになったら一覧画面に飛ばす
      return view('library/libraryBookSignUp');

    }

    /**
    * 新規登録処理
    *「bookSignUp」メソッドの内容を登録
    *
    * @param Request $request
    * @return \Illuminate\Http\Response
    */

    public function bookRegister(Request $request)
    {
      // header('Content-type: text/plain; charset= UTF-8');
      // $newBookName = $_POST['newBookName'];

      $newBook = new Books;

      if ($request->input('InputNewBookName') == "" || strlen($request->input('InputNewBookName')) > 80) {
        // echo "<script> alert('本の名前を『40文字以内』で入力して下さい。'); </script>";
        // if ("<script> alert('本の名前を『40文字以内』で入力して下さい。'); </script>") {
          return redirect('/libraryBookSignUp');
          // code...
        // }
      }
      else {
        $newBook->name = $request->input('InputNewBookName');
        // $newBook->name = $newBookName;
        $newBook->save();
        return redirect('/libraryHome');

      }

    }

    public function bookEdit($id)
    {
      $rent_log = Rent_logs::all();

      $book = Books::find($id);

      $userName = Auth::user()->name;

      // amazonでの商品情報を取得
      $bookInfo=Books::info($id);

      return view('library/libraryBookEdit', ['book' => $book
                                             ,'rent_log' => $rent_log
                                             ,'userName' => $userName
                                           ]);
                                       
    }

    /**
    *[bookEdit]の内容を登録
    * @param Request $request
    * @return \Illuminate\Http\Response
    */

    public function bookUpdate(Request $request)
    {
      // 更新前の商品名のID情報を更新時に使用するため
      $beforeBookId = $request->input('beforeBookId');
      $bookName = $request->input('inputBookName');

      Books::where('id', $beforeBookId)->update([
        'name' => $bookName
      ]);

      return redirect('/libraryHome');
    }

    public function bookBorrow()
    {
      header('Content-type: text/plain; charset= UTF-8');

      // if(isset($_POST['returnDate']))
      // {
        // $userId = $_POST['userId'];
        // $pas = $_POST['password'];
        // $returnDate = $_POST['returnDate'];
        $bookId = $_POST['bookId'];
        $borrowDate = date("Y-m-d");

        // $bookId = $_POST['bookId'];
        // modalでの入力がここまで飛ばせているかの確認
        // $bookId = $_POST['userId'];

        // $bookId = 1;
        // $str = "AJAX REQUEST SUCCESS\nuserId:".$userId."\npassword:".$pas."\n";
        // $result = nl2br($str);

        Books::where('id', $bookId)->update([
          'status' => 1,
        ]);

        $newRent = new Rent_logs;
        $newRent->book_id = $bookId;
        $newRent->borrow_date = $borrowDate;
        // $newRent->return_date = $returnDate;
        //   // 現在認証されているユーザーのID取得
        //   $id = Auth::id();
        $newRent->rent_user_id = Auth::id();

        $newRent->save();

        // return redirect('/libraryHome');
        return response()->json([
            // "$bookId" => $bookId
        ]);

    }

    public function bookReturn()
    {
      header('Content-type: text/plain; charset= UTF-8');

      // if(isset($_POST['userId']) || isset($_POST['password']))
      // {
      //   $userId = $_POST['userId'];
      //   $pas = $_POST['password'];
      $bookId = $_POST['bookId'];
      // $bookId = 3;

      $returnDate = date("Y-m-d");

      Books::where('id', $bookId)->update([
          'status' => 0,
        ]);
        Rent_logs::where('book_id', $bookId)
                 ->where('rent_user_id', Auth::id())
                 ->update([
                   'return_date' => $returnDate
                          ]);

        return response()->json([
          'SUCCESS TO AJAX REQUEST:$bookId'
        ]);
      // }
      // else
      // {
      //   // echo 'FAIL TO AJAX REQUEST';
      //   return response()->json([
      //     'FAIL TO AJAX REQUEST'
      //   ]);
      // }
      //
      // return redirect('/libraryHome');
      // return redirect('/libraryBorrowingList');
    }

    public function bookDelete($id)
    {
      //本の情報を削除する内容を以下に記載
      Books::destroy($id);

      return redirect('/libraryHome');

    }
}