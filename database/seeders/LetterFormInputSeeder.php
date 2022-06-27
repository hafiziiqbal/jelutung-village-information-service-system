<?php

namespace Database\Seeders;

use App\Models\LetterFormInput;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterFormInputSeeder extends Seeder
{

    public function run()
    {
        $csvFile = fopen('./database/seeders/csv/letter-form-input.csv', 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                LetterFormInput::updateOrCreate([
                    "letter_template" => $data['1'],
                    "name" => $data['2'],
                    "type" => $data['3'],
                    "options" => $data['4'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
