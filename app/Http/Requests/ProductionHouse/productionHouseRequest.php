<?php

namespace App\Http\Requests\ProductionHouse;

use Illuminate\Foundation\Http\FormRequest;

class productionHouseRequest extends FormRequest
{
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
        if (request()->method == 'POST') {
            # code...
            return [
//                'userSearch'        => 'required|exists:user_profile,id',
                'name'      => 'required',
            ];
        } else {
            # code...
            return [
                'name'      => 'required'
            ];
        }

    }

    // public function messages()
    // {
        
    // }
}
