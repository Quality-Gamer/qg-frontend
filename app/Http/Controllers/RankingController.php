<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RankingController extends Controller
{
    public function index(Request $request){
        $url = config('microsservices.gateway');
        $key = config('microsservices.key');
        if($request->session()->has('user')){
            $user = new \App\User;
            $user->id = $request->session()->get('user')['id'];
            $user->name = $request->session()->get('user')['name'];
            $user->email = $request->session()->get('user')['email'];
            $user->char = $request->session()->get('user')['char'];
            $data = array();
            Auth::login($user);
            return view("ranking.index",$data);
        }
        return redirect("/");
    }
}
