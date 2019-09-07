<?php

namespace App\Http\Requests\Mutasi;

use Illuminate\Foundation\Http\FormRequest;

class mutasiRequest extends FormRequest
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
                'jenis_mutasi'      => 'required',
                'tanggal_mutasi'    => 'required|date',
                'sk_mutasi'         => 'required',
            ];
        } else {
            # code...
            return [
                'jenis_mutasi'      => 'required',
                'tanggal_mutasi'    => 'required|date',
            ];
        }

    }

    // public function messages()
    // {
        
    // }
}
