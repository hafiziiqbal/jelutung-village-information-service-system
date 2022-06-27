<?php

namespace Tests\Feature\Store;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StoreLetterTemplateTest extends TestCase
{
    use WithFaker;
    public function test_store_letter_template()
    {

        $response = $this->post('/api/letter-template/', [
            'name' => 'Surat Keterangan Tidak Mampu',
            'letterCategory' => '1',
            'needForLetter' => '3',
            'docFile' => UploadedFile::fake()->create('surat-keterangan-tidak-mampu.docx', 100),
            'inputs'  => [
                [
                    'name' => 'nama lengkap pemohon',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'tempat lahir pemohon',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'tanggal lahir pemohon',
                    'type' => [
                        'typeName' => 'Tanggal',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'jenis kelamin pemohon',
                    'type' => [
                        'typeName' => 'Pilihan',
                        'typeOptions' => 'laki laki; perempuan'
                    ],
                ],
                [
                    'name' => 'pekerjaan pemohon',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'nama orang tua',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'agama pemohon',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'pekerjaan orang tua',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'alamat',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],
                [
                    'name' => 'nama bantuan pendidikan',
                    'type' => [
                        'typeName' => 'Teks',
                        'typeOptions' => ''
                    ],
                ],


            ]
        ]);
        $response->assertStatus(200);
    }
}
