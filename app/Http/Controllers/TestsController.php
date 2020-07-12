<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{
    public function index(Request $request){
        $data = [];
        return view("tests.index",$data);
    }

   

}
