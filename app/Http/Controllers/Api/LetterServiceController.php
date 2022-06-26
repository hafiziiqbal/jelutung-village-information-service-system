<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LetterCategory;
use App\Models\LetterFormInput;
use App\Models\LetterRequest;
use App\Models\LetterTemplate;
use Illuminate\Http\Request;

class LetterServiceController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // -VALIDATION----------------------------------------------------------------------------------------------------------
        $requestMapping = [
            'letter_id' => 'required|numeric',
        ];
        $messageValidation = [];
        $letterTemplate = LetterFormInput::where('letter_template', $request->letter_id)->get();
        foreach ($letterTemplate as $key => $value) {
            $letterName = str_replace(' ', '_', strtolower($value->name));
            if ($request->input != null) {
                foreach ($request->input as $key1 => $value1) {
                    if ($letterName == $key1 || $value1 != '') {
                        if (str_contains($key1, 'nomor_induk') || str_contains($key1, 'nik')) {
                            $requestMapping['input.' . $key1] = 'numeric|digits:16';
                            $messageValidation['input.' . $key1 . '.numeric'] = 'data harus berupa angka';
                            $messageValidation['input.' . $key1 . '.digits'] = 'data harus 16 digit';
                        } elseif (str_contains($key1, 'tanggal')) {
                            $requestMapping['input.' . $key1] = 'date';
                            $messageValidation['input.' . $key1 . '.date'] = 'data harus berupa tanggal';
                        }
                        $requestMapping['input.' . $letterName] = 'required';
                        $messageValidation['input.' . $letterName . '.required'] = 'data harus diisi';
                    } else {
                        $requestMapping['input.' . $letterName] = 'required';
                        $messageValidation['input.' . $letterName . '.required'] = 'data harus diisi';
                    }
                }
            } else {
                $requestMapping['input.' . $letterName] = 'required';
                $messageValidation['input.' . $letterName . '.required'] = 'data harus diisi';
            }
        }
        $validated = $request->validate($requestMapping, $messageValidation);
        // -VALIDATION----------------------------------------------------------------------------------------------------------

        $createLetterRequest = LetterRequest::create([
            'letter_template' => $validated['letter_id'],
            "value" => $validated['input']
        ]);
    }

    public function show($id)
    {
        $letterFormInput = LetterFormInput::where('letter_template', $id)->get();
        return response()->json($letterFormInput, 200);
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

    public function showLetterFromCategory($id)
    {
        $letterByCategory = LetterTemplate::select('id', 'name', 'letter_category')->whereRelation('letterCategory', 'id', '=', $id)->get();
        return response()->json($letterByCategory, 200);
    }
}
