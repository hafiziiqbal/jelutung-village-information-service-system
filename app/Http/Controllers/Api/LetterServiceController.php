<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LetterFormInput;
use App\Models\LetterRequest;
use App\Models\LetterTemplate;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use stdClass;

use function PHPUnit\Framework\returnSelf;

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
