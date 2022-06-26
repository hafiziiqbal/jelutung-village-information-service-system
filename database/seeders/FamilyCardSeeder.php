<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\FamilyCard;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FamilyCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen('./database/seeders/csv/data-dummy-kk.csv', 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                FamilyCard::updateOrCreate([
                    "card_number" => $data['1'],
                    "address" => $data['2'],
                    "rt_rw" => $data['3'],
                    "zip_code" => $data['4'],
                    "village" => $data['5'],
                    "districts" => $data['6'],
                    "city" => $data['7'],
                    "province" => $data['8'],
                    "out_date" => Carbon::parse($data['9']),
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
