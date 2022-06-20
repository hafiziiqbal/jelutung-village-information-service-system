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

            'name' => 'required|regex:/^([a-zA-Z.]+)(\s[a-zA-Z.]+)*$/',
            'forWho' => 'required|in:pribadi,orang-lain',
            'letterCategory' => 'required|numeric',
            'needForLetter' => 'required|numeric',
            'docFile' => 'required|mimes:doc,docx|max:3048',
            'inputs.*.name' => 'required',
            'inputs.*.type.typeName' => 'required',
            'inputs.*.type.typeOptions' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama surat harus diisi',
            'name.regex' => 'Nama surat harus berupa karakter A-Z',

            'forWho.required' => 'Peruntukan surat harus diisi',
            'forWho.in' => 'Peruntukan surat harus pribadi atau orang lain',

            'letterCategory.required' => 'Kategori surat harus dipilih',
            'letterCategory.numeric' => 'Kategori surat harus berupa angka',

            'needForLetter.required' => 'Keperluan surat harus dipilih',
            'needForLetter.numeric' => 'Keperluan surat harus berupa angka',

            'docFile.required' => 'Dokumen harus dimasukan',
            'docFile.mimes' => 'Dokumen harus berbentuk DOC atau DOCX',
            'docFile.max' => 'Dokumen harus maksimal 3 MB',

            'inputs.*.name.required' => 'Input tambahan harus diisi',
            'inputs.*.type.typeName.required' => 'Jenis input tambahan harus dipilih',

        ];
    }
}
