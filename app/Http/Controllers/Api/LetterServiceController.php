<?php

namespace App\Http\Controllers\Api;

use stdClass;
use Illuminate\Http\Request;
use App\Models\LetterRequest;
use App\Models\LetterTemplate;
use App\Models\LetterFormInput;

use App\Http\Controllers\Controller;

class LetterServiceController extends Controller
{
    public function index()
    {
        $letterRequest = LetterRequest::with('letter', 'user.name')->get();
        $mapLetterRequest = $letterRequest->map(function ($item, $key) {
            return [
                'name' => $item->user->name->name,
                'letter_name' => $item->letter->name,
                'value' => $item->value,
                'created_at' => date('d/m/Y h:m', strtotime($item->created_at))

            ];
        });

        return response()->json(
            $mapLetterRequest,
            200
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $jsonLetterService = new stdClass;
        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'foto') || str_contains($key, 'gambar')) {
                $imageName = time() . preg_replace('/\s+/', '', strtolower($key)) . '.' . $request->file($key)->extension();
                $request->file($key)->storeAs('public/img/support-documents', $imageName);
                $jsonLetterService->$key = $imageName;
            } else {
                if ($key !== 'letter_id' && $key != 'user_id') {
                    $jsonLetterService->$key = $value;
                }
            }
        }

        $createLetterRequest = LetterRequest::create([
            'user_id' => $request->user_id,
            'letter_template' => $request->letter_id,
            "value" => $jsonLetterService
        ]);

        return response()->json(
            [
                'message' => 'Permohonan surat telah dikirimkan, silahkan tunggu dalam 24 jam',
                'status' => true
            ],
            200
        );
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
