<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APIService extends Model
{
    public static function getHttpRequest($url,$params = []){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        return ["status_code" => $response->getStatusCode(),"body" => json_decode($response->getBody())];
    }

    public static function postHttpRequest($url,$params = []){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, [
            'form_params' => $params
        ]);
        return ["status_code" => $response->getStatusCode(),"body" => json_decode($response->getBody())];
    }
}
