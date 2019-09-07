<?php

namespace App\Http\Requests\RiwayatPendidikan;

use Illuminate\Foundation\Http\FormRequest;

class riwayatpendidikanRequest extends FormRequest
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
                'userSearch'               => 'required|unique:user_profile,id,'.request()->id,
                'tingkatPendidikan'        => 'required',
                'namaSekolah'              => 'required',
                'alamatSekolah'            => 'required',
                'jurusan'                  => 'required',
                'noIjazah'                 => 'required',
                'tanggalIjazah'            => 'required|date',
                'fileIjazah'               => 'required',
                'fileTranskipIjazah'       => 'required',
                'fileSertifikatPendidik'   => 'required',
            ];
        } else {
            # code...
            return [
                'tingkatPendidikan'        => 'required',
                'namaSekolah'              => 'required',
                'alamatSekolah'            => 'required',
                'jurusan'                  => 'required',
                'noIjazah'                 => 'required',
                'tanggalIjazah'            => 'required|date',
            ];
        }

    }

    // public function messages()
    // {
        
    // }
}
