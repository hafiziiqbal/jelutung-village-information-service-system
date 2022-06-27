<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $csvFile = fopen('./database/seeders/csv/data-dummy-user.csv', 'r');

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                $user =   User::updateOrCreate([
                    "nik" => $data['1'],
                    "address" => $data['2'],
                    "profession" => $data['3'],
                    "marital_status" => $data['4'],
                    "email" => $data['5'],
                    "phone_number" => $data['6'],
                    "pin" => $data['7'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        $userSpecial = User::select('id')->get();
        foreach ($userSpecial as $user) {
            if ($user->id == 1) {
                $user->assignRole('administrator');
            } elseif ($user->id == 2) {
                $user->assignRole('operator');
            } else {
                $user->assignRole('resident');
            }
        }
    }
}
