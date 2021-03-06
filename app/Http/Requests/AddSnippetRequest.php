<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class AddSnippetRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|min:3|max:50',
			'short_desc' => 'required|min:5|max:50',
			'long_desc' => 'min:5',
			'code' => 'required'
		];
	}

}
