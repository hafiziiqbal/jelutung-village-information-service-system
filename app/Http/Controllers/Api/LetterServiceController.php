<?php

namespace App\Http\Controllers\Api;

use stdClass;
use Illuminate\Http\Request;
use App\Models\LetterRequest;
use App\Models\LetterTemplate;
use App\Models\LetterFormInput;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

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
        $letterFormInput = LetterTemplate::find($id)->select('id', 'document')->first();
        $templateProcessor = new TemplateProcessor('storage/documents/letter-template/' . $letterFormInput->document);
        $keyInputs = array();

        // remapping array
        foreach ($templateProcessor->getVariables() as $key => $input) {

            // validation input and give type
            if (!str_contains($input, 'nomor_surat') && !str_contains($input, 'tanggal_keluar') && !str_contains($input, 'qr_code')) {
                $type = 'default';

                if (str_contains($input, 'tanggal')) {
                    $type = 'date';
                } elseif (str_contains($input, 'nama')) {
                    $type = 'text';
                } elseif (str_contains($input, 'gambar') || str_contains($input, 'foto')) {
                    $type = 'image';
                } elseif (str_contains($input, 'kelamin')) {
                    $type = 'options_gender';
                }

                $inputObject = new stdClass();
                $inputObject->name = $input;
                $inputObject->type = $type;
                array_push($keyInputs, $inputObject);
            }
        }
        return response()->json($keyInputs, 200);
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

    public function createDocument()
    {
        $templateProcessor = new TemplateProcessor('Template.docx');
        $pathQrCode = public_path('code-qr.jpg');
        return $templateProcessor->getVariables();
        exit();
        $templateProcessor->setValues([
            'firstname' => 'Hafizi',
            'lastname' => 'iqbal',
        ]);
        $templateProcessor->setImageValue('codeQR', array('path' => 'code-qr.jpg', 'width' => 100, 'height' => 100, 'ratio' => false));
        $templateProcessor->saveAs('hafizi.docx');
    }
}
