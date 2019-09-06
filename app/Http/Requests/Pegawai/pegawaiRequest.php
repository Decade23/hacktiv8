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
        if (request()->method == 'POST') {
            # code...
            return [
                'nip'                           => 'required|unique:user_profile,nip',
                'ktp'                           => 'required|unique:user_profile,ktp',
                'nama'                          => 'required',
                'tempat_lahir'                  => 'required',
                'tanggal_lahir'                 => 'required|date',
                'jenis_kelamin'                 => 'required',
                'statusKawin'                   => 'required',
                'statusKepegawaian'             => 'required',
                'alamat'                        => 'required',
                'noTelepon'                     => 'required',
            ];
        } else {
            # code...
            return [
                'nip'                           => 'required|unique:user_profile,nip,'.request()->id,
                'ktp'                           => 'required|unique:user_profile,ktp,'.request()->id,
                'nama'                          => 'required',
                'tempat_lahir'                  => 'required',
                'tanggal_lahir'                 => 'required|date',
                'jenis_kelamin'                 => 'required',
                'statusKawin'                   => 'required',
                'statusKepegawaian'             => 'required',
                'alamat'                        => 'required',
                'noTelepon'                     => 'required',
            ];
        }

    }

    // public function messages()
    // {
        
    // }
}
