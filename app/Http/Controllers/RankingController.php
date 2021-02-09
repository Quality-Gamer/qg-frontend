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
            $user->level = $request->session()->get('user')['level'];
            $user->score = $request->session()->get('user')['score'];
            $user->university = $request->session()->get('user')['university'];
            $user->color = $request->session()->get('user')['color'];

            $page = $request->input('page');
            $page = $page - 1;
            $params = array(
                "ms" => "ranking",
                "action" => "get/rank",
                "params" => array(
                    "page" => $page,
                ),
                "method" => "GET",
                "cacheable" => 0,
            );
    
            $response = APIService::postHttpRequest($url,$params,$key);
            $body = $response["body"]->response;
            $total = $body->total;
            $rank = $body->rank;


            $data = array(
                "total" => $total,
                "rank" => $rank,
            );

            Auth::login($user);
            return view("ranking.index",$data);
        }
        return redirect("/");
    }
}
