<?php namespace App\Http\Requests;
	
use App\Http\Requests\Request;

class GrantRemoveMembershipRequest extends Request {
	
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
			'membership_id' => 'required',
			'user_id' => 'required',
			'spaces_to_change' => 'required|numeric|min:1'
		];
	}
}