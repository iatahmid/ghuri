<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Contributor extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //
    use Authenticatable;
    
	protected $fillable = [
        'name', 'email', 'password',
    ];

	protected $primaryKey = 'email';
	protected $table = 'contributors';
	public $timestamps = false;
}
