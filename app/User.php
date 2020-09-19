<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\APIService;

class User extends Authenticatable
{
    use Notifiable;

    public static function getAllUsers() {
        $url = "https://qg-usuario.herokuapp.com/api/load/users";
        $response = APIService::getHttpRequest($url);
        
        foreach ($response['body'] as $key => $value) {
            if(isset(auth()->user()->id) && !empty(auth()->user()->id) && $value->id == auth()->user()->id) {
                unset($response['body'][$key]);
            }
        }

        return $response['body'];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
