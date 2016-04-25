<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Apply;

use Redirect, Input;

class AppliesController extends Controller {

	public function index()
	{
		$applies = Apply::latest()->IsActive()->get();
		return view('admin.applies.index',compact('applies'));
		//return view('admin.applies.index')->withApplies(Apply::all());
	}

	public function edit($id)
	{
		return view('admin.applies.edit')->withApply(Apply::find($id));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nickname' => 'required',
			'content' => 'required',
		]);
		if (Apply::where('id', $id)->update(Input::except(['_method', '_token']))) {
			return Redirect::to('admin/applies');
		} else {
			return Redirect::back()->withInput()->withErrors('更新失败！');
		}
	}

	public function destroy($id)
	{
		$apply = Apply::find($id);
		$apply->delete();

		return Redirect::to('admin/applies');
	}

}
