<?php

namespace App\Http\Requests\Pangkat;

use Illuminate\Foundation\Http\FormRequest;

class pangkatRequest extends FormRequest
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
                'pangkat'           => 'required',
                'golongan'          => 'required',
                'nomor_sk'          => 'required',
                'tanggal_sk'        => 'required|date',
                'sk_file_pangkat'   => 'required',
            ];
        } else {
            # code...
            return [
                'pangkat'           => 'required',
                'golongan'          => 'required',
                'nomor_sk'          => 'required',
                'tanggal_sk'        => 'required|date',
            ];
        }

    }

    // public function messages()
    // {
        
    // }
}
