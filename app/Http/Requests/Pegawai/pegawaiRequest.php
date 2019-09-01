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
            'nip'                           => 'required|unique:user_profile,nip',
            //'noKtp'                         => 'required',
            'nama'                          => 'required',
            //'email'                         => 'required|email',
            'noTelepon'                     => 'required',
            'tempat_lahir'                  => 'required',
            'tanggal_lahir'                 => 'required|date',
            'jenis_kelamin'                 => 'required',
            'statusKawin'                   => 'required',
            //'jabatan'                       => 'required',
            'statusKepegawaian'             => 'required',
            'alamat'                        => 'required',
            
        ];
    }

    // public function messages()
    // {
        
    // }
}
