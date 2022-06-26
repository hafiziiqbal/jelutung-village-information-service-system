<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Resident;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen('./database/seeders/csv/data-dummy-resident.csv', 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Resident::updateOrCreate([
                    "nik" => $data['1'],
                    "card_number" => $data['2'],
                    "name" => $data['3'],
                    "gender" => $data['4'],
                    "birthplace" => $data['5'],
                    "birthday" => Carbon::parse($data['6']),
                    "religion" => $data['7'],
                    "qualification" => $data['8'],
                    "profession_type" => $data['9'],
                    "blood_group" => $data['10'],
                    "marital_status" => $data['11'],
                    "wedding_date" => Carbon::parse($data['12']),
                    "family_relationship" => $data['13'],
                    "citizenship" => $data['14'],
                    "passport_number" => $data['15'],
                    "kitap_number" => $data['16'],
                    "father_name" => $data['17'],
                    "mother_name" => $data['18'],
                    "life_status" => $data['19'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
