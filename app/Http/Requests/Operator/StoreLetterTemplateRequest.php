<?php

namespace App\Http\Requests\Operator;

use Illuminate\Foundation\Http\FormRequest;

class StoreLetterTemplateRequest extends FormRequest
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
     * @return array<string, mixed>
     */


    public function rules()
    {

        return [

            'name' => 'required',
            'letterCategory' => 'required|numeric',
            'docFile' => 'required|mimes:doc,docx|max:9048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama surat harus diisi',

            'letterCategory.required' => 'Kategori surat harus dipilih',
            'letterCategory.numeric' => 'Kategori surat harus dipilih',

            'docFile.required' => 'Dokumen harus dimasukan',
            'docFile.mimes' => 'Dokumen harus berbentuk DOC atau DOCX',
            'docFile.max' => 'Dokumen harus maksimal 9 MB',
        ];
    }
}
