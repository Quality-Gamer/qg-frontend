<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index(Request $request){
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
                $url = config('microsservices.manager.create');
                $url .= "?user_id=" . $user->id;
                $url .= "&challenge_id=1";
                
                $response = APIService::getHttpRequest($url);

                if($response["body"] && $response["body"]->status == "OK"){
                    $r = $response["body"]->response[0];
                    $managerId = $r->id;
                    $request->session()->put('manager_id', $managerId);
                    $data["new"] = 1;
                } else {
                    $data["message"] = "Erro ao conectar com o servidor.";
                }
            }


            if($request->session()->get('manager_id')){
                $data["manager_id"] = $request->session()->get('manager_id');
                $u = config('microsservices.manager.find');
                $u .= "?user_id=" . $user->id;
                $u .= "&manager_id=" . $data["manager_id"];
                    
                $resp = APIService::getHttpRequest($u);
                if($resp["body"] && $resp["body"]->status == "OK"){
                    $res = $resp["body"]->response[0];
                    $week = $res->week;
                    $data["week"] = $week;
                } else {
                    $data["message"] = "Erro ao conectar com o servidor.";
                }
            } else {
                $data["message"] = "Erro ao conectar com o servidor.";
            }
            
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
