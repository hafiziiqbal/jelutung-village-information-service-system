<?php

namespace Database\Seeders;

use App\Models\LetterTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterTemplateSeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen('./database/seeders/csv/letter-template.csv', 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                LetterTemplate::updateOrCreate([
                    "name" => $data['1'],
                    "letter_category" => $data['2'],
                    "need_for_letter" => $data['3'],
                    "document" => $data['4'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
