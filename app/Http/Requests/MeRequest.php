<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MeRequest extends Request {

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
			'Name' => 'required|min:3|max:50',
			'Country' => 'required|min:3|max:50',
			'Password' => 'min:6|max:60',
			'RepeatPassword' => 'min:6|max:60'
		];
	}

}
