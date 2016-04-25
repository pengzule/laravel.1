<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect, Input;

use App\Comment;

class CommentsController extends Controller {

	public function store()
	{
		$comments = Input::all(); //Request::all();
		if (Comment::create($comments)) {
			return Redirect::back();
		} else {
			return Redirect::back()->withInput()->withErrors('评论发表失败！');
		}

	}

}
