<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    
	protected $table = 'boutiques';
    public $timestamps = true;
    protected $guarded = [];
}
