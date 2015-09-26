<?php namespace App\Http\Requests;
	
use App\Http\Requests\Request;

class ClasseRequest extends Request {
	
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
			'title' => 'required|max:255',
			'description' => 'required',
			'supervisor_id' => 'required|integer',
			'picture_link' => 'required|url',
			'date' => 'required',
			'end_date' => 'required',
			'places_available' => 'required|integer',
			'cost' => 'required|numeric',
			'cost_member' => 'required|numeric',
			'location_id' => 'required|integer'
		];
	}
}