<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class User extends Model implements Authenticatable
{
    use Notifiable, BasicAuthenticatable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'motDePasse',
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


    public function getAuthPassword()
    {
        return $this->motDePasse; 
    }

    public function admin()
    {
    	return $this->hasOne('App\Admin');
    }

    public function ateliers()
    {
    	return $this->hasMany('App\Atelier');
    }

    public function boutiques()
    {
    	return $this->hasOne('App\Boutique');
    }

    public function client()
    {
    	return $this->hasOne('App\Client');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created( function($user) {

    //         $user->client()->create([

    //             "numeroDeTelephone" => request('contact'),
    //             "user_id" => $user->id,

    //         ]);

    //     });
    // }

}
