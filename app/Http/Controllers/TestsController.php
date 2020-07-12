<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{
    public function index(Request $request){
        $data = array();
        if($request->session()->has('user')){
            $user = new \App\User;
            $user->id = $request->session()->get('user')['id'];
            $user->name = $request->session()->get('user')['name'];
            $user->email = $request->session()->get('user')['email'];
            Auth::login($user);

            $key = config('microsservices.key');
            $url = config('microsservices.gateway');
            $params = array(
                "ms" => "tests",
                "action" => "tests",
                "params" => array(
                    "user_id" => $user->id,
                ),
                "method" => "GET",
                "cacheable" => 0,
            );
            
            $response = APIService::postHttpRequest($url,$params,$key);
            $body = $response["body"]->response;
            if($body && $body->status == "OK"){
                $data['allow'] = $body->response->allow;
                $data['deny'] = $body->response->deny;
            } else {
                $data["message"] = "Erro ao conectar com o servidor.";
            }
            return view("tests.index",$data);
        }
        return redirect("/");
    }

   

}
