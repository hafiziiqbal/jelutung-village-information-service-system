<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operator\StoreLetterTemplateRequest;
use App\Models\LetterFormInput;
use App\Models\LetterTemplate;
use Illuminate\Http\Request;

class LetterTemplateController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreLetterTemplateRequest $request)
    {
        $documentName = time() . preg_replace('/\s+/', '', strtolower($request->name)) . '.' . $request->docFile->extension();
        LetterTemplate::create([
            'name' => $request->name,
            'letter_category' => $request->letterCategory,
            'document' => $documentName
        ]);
        $request->file('docFile')->storeAs('public/documents/letter-template', $documentName);

        return response()->json(
            [
                'message' => 'Template surat berhasil di simpan',
                'status' => true
            ],
            200
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
