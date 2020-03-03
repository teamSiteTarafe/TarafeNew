<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

	protected $table = 'admins';

    public $timestamps = true;
    protected $guarded = [''];
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
