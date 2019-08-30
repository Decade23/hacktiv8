<?php

namespace App\Http\Requests\Pegawai;

use Illuminate\Foundation\Http\FormRequest;

class pegawaiRequest extends FormRequest
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
        return [
            'nama'                          => 'required',
            'nip'                           => 'required',
            'no_ktp'                        => 'required|email',
            // 'member.phone'                  => 'required|numeric|min:8',
            // 'member.address.subdistrict_id' => 'required',
            // 'member.address.province'       => 'required',
            // 'member.address.postal_code'    => 'required',
        ];
    }

    // public function messages()
    // {
        
    // }
}
