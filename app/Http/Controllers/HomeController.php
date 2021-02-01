<?php

namespace App\Http\Controllers;

use App\APIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $url = config('microsservices.gateway');
        $key = config('microsservices.key');
        $params = array(
            "ms" => "main",
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
            $user->setCharAttribute($body->response->char_id);
            $request->session()->put('user', $user);
            Auth::login($user);
        } else {
            $data["message"] = "Usuário e/ou senha inválidos";
        }
        
        $view = Auth::user() ? "/manager" : "/";

        return Auth::user() ? redirect($view) : view($view,$data);
    }

    public function index(Request $request) { 
        if($request->session()->has('user')){
            $user = new \App\User;
            $user->id = $request->session()->get('user')['id'];
            $user->name = $request->session()->get('user')['name'];
            $user->email = $request->session()->get('user')['email'];
            $user->char = $request->session()->get('user')['char'];
            Auth::login($user);
            return redirect('/manager');
        }
        return view('home.site');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/');
    }

    public function register(Request $request) {
        $url = config('microsservices.gateway');
        $key = config('microsservices.key');
        $params = array(
            "ms" => "main",
            "action" => "universities",
            "method" => "GET",
            "cacheable" => 1,
        );

        $response = APIService::postHttpRequest($url,$params,$key);
        $body = $response["body"]->response;
        $data = [];
        $data["universities"] = $body->response;
        
        if ($request->input("err")) {
            $data["message"] = "Falha ao cadastrar usuário";
        }
        
        return view('home.register', $data);
    }

    public function createUser(Request $request) {
        $url = config('microsservices.gateway');
        $key = config('microsservices.key');
        $params = array(
            "ms" => "main",
            "action" => "create/user",
            "params" => array(
                "name" => $request->input('name'),                
                "email" => $request->input('email'), 
                "password" => $request->input('password'),
                "char" => $request->input('char_input'),
                "university" => $request->input('university_input'),
            ),
            "method" => "POST",
            "cacheable" => 0,
        );

        $response = APIService::postHttpRequest($url,$params,$key);
        $body = $response["body"]->response;
        $success = $body->status == "OK" ? true : false;
        
        if($success) {
           return APIService::sendJson(["status" => "OK", "response" => $response]);
        }

        return APIService::sendJson(["status" => "NOK", "response" => $response]);
    }

    public function forgot(Request $request) {

        return view('home.forgot', []);
    }
}
