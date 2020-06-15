<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index(Request $request){
        $url = config('microsservices.gateway');
        if($request->session()->has('user')){
            $user = new \App\User;
            $user->id = $request->session()->get('user')['id'];
            $user->name = $request->session()->get('user')['name'];
            $user->email = $request->session()->get('user')['email'];
            $data = array();
            $data["manager_id"] = null;
            $data["new"] = 0;
            $data["week"] = 1;

            if(!$request->session()->get('manager_id')){
                $params = array(
                    "ms" => "manager",
                    "action" => "create",
                    "params" => array(
                    "user_id" => (string)$user->id,
                    "challenge_id" => "1",
                    ),
                    "method" => "GET",
                    "cacheable" => 0,
                );
                
                $response = APIService::postHttpRequest($url,$params);
                $body = $response["body"]->response;
                
                if($body && $body->status == "OK"){
                    $r = $body->response[0];
                    $managerId = $r->id;
                    $request->session()->put('manager_id', $managerId);
                    $data["new"] = 1;
                } else {
                    $data["message"] = "Erro ao conectar com o servidor.";
                }
            }


            if($request->session()->get('manager_id')){
                $data["manager_id"] = $request->session()->get('manager_id');
                
                $p = array(
                    "ms" => "manager",
                    "action" => "find",
                    "params" => array(
                    "user_id" => (string)$user->id,
                    "manager_id" => (string)$data["manager_id"]
                    ),
                );
                    
                $resp = APIService::postHttpRequest($url,$p);
                $body = $resp["body"]->response;
                if($body && $body->status == "OK"){
                    $res = $body->response[0];
                    $week = $res->week;
                    $data["week"] = $week;
                } else {
                    $data["message"] = "Erro ao conectar com o servidor.";
                }
            } else {
                $data["message"] = "Erro ao conectar com o servidor.";
            }
            
            $data["url"] = config('microsservices.gateway');
            Auth::login($user);
            return view("manager.index",$data);
        }
        return redirect("/");
    }

    // deprecated
    public function updateWeek(Request $request){
        $request->session()->put('week',$request->input('week'));
    }

    // Only dev env
    public function reset(Request $request){
        $request->session()->forget('manager_id');
        $request->session()->forget('week');

        return redirect("/");
    }
}
