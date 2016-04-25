<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
   	protected $fillable = ['title', 'slug', 'body', 'user_id','is_active'];

	public function scopeIsActive($query)
	{
	    $query->where('is_active','=',1);
	}
}


