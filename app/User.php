<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'idOsetrovatele',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // TODO @iss tohle nefunguje pořádně, chce to relationship - je to shit
    public function getOsetrovatele() {
        return $this->belongsTo('App\Osetrovatel');
//        return Osetrovatel::find($this->idOsetrovatele);
    }
}
