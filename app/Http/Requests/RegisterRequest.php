<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'Email' => 'required|email|min:3|max:60|unique:users',
			'Name' => 'required|min:3|max:50',
			'Country' => 'required|min:3|max:50',
			'Password' => 'required|min:6|max:60|same:RepeatPassword',
			'RepeatPassword' => 'required|min:6|max:60'
		];
	}

}
