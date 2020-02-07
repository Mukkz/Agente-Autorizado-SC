<?php

namespace App;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','admin','cluster'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function  getNome(){
        return $this->nome;
    }

    public function preventivas()
    {
        return $this->hasMany(Preventiva::class);
    }

    public function bas()
    {
        return $this->hasMany(Ba::class);
    }

    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
