<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostumersRequest extends FormRequest
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
            'nama' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?!.*\b(MR|MRS|MS|DR|PROF|DRS|HAJI|HJ|LC|MM|MA|PAK|BU|IBU|BAPAK)\b).*$/i' // Disallows common titles
            ],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'kode_pekerjaan' => 'required|string|exists:tbl_master_pekerjaan,kode',
            'kode_provinsi' => 'required|string|exists:tbl_master_province,kode',
            'kode_kabupaten_kota' => 'required|string|exists:tbl_master_city,kode',
            'kode_kecamatan' => 'required|string|exists:tbl_master_subdistrict,kode',
            'kode_kelurahan' => 'required|string|exists:tbl_master_ward,kode',
            'alamat' => 'required|string|max:500',
        ];
    }


    public function messages()
    {
        return [
            'nama.unique' => 'The name has already been taken.',
            'nama.regex' => 'The name cannot contain titles like Mr., Mrs., etc.',
        ];
    }
}
