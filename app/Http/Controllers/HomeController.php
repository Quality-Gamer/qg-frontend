<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $url = config('microsservices.gateway');
        $key = config('microsservices.key');
        $params = array(
            "ms" => "user",
            "action" => "login",
            "params" => array("email" => $email, "password" => $password),
            "method" => "POST",
            "cacheable" => 0,
        );
        
        $response = APIService::postHttpRequest($url,$params,$key);
        $body = $response["body"]->response;
        $data = array();

        if(isset($body->response->name) && isset($body->response->email)){
            $user = new \App\User;
            $user->name = $body->response->name;
            $user->email = $body->response->email;
            $user->id = $body->response->id;
            $request->session()->put('user', $user);
            Auth::login($user);
        } else {
            $data["message"] = "Usuário e/ou senha inválidos";
        }
        
        $view = Auth::user() ? "home.index" : "home.site";

        return view($view,$data);
    }

    public function index(Request $request) { 
        if($request->session()->has('user')){
            $user = new \App\User;
            $user->id = $request->session()->get('user')['id'];
            $user->name = $request->session()->get('user')['name'];
            $user->email = $request->session()->get('user')['email'];
            Auth::login($user);
            return view('home.index');
        }
        return view('home.site');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/');
    }
}
