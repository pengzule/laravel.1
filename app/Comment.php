<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    
	 protected $fillable = ['nickname', 'email', 'website', 'content','user','is_active', 'page_id'];

}
