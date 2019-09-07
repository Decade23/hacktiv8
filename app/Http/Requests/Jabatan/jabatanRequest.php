<?php

namespace App\Http\Requests\Jabatan;

use Illuminate\Foundation\Http\FormRequest;

class jabatanRequest extends FormRequest
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
                'userSearch'        => 'required|exists:user_profile,id',
                'jabatan'           => 'required',
                'golongan'          => 'required',
                'tmt_jabatan'       => 'required',
                'sk_file_jabatan'   => 'required',
            ];
        } else {
            # code...
            return [
                'jabatan'           => 'required',
                'golongan'          => 'required',
                'tmt_jabatan'       => 'required',
            ];
        }

    }

    // public function messages()
    // {
        
    // }
}
