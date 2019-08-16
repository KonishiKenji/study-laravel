<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Input;

// use App\Library;
use App\AmazonProduct; // 追加

class KindleSearchApiController extends Controller
{
    public function index()
    {
        //
        // $response = AmazonProduct::search('All', 'amazon' , 1);

        // return $response;

        // $data = "https://www.googleapis.com/books/v1/volumes?q=intitle:プラチナエンド&Country=JP";
        // $json = file_get_contents($data);
        // $json_decode = json_decode($json, true);
        // $test_data = $json_decode['kind'];
        $test_data = "これは表示テストです";

        return $test_data;
    }
}