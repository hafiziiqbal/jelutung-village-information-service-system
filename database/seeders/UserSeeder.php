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
                    "password" => $data['7'],
                ]);
                $user->assignRole('resident');
            }
            $firstline = false;
        }
        fclose($csvFile);

        $userSpecial = User::select('id')->whereIn('id', [1, 2])->get();
        foreach ($userSpecial as $user) {
            if ($user->id == 1) {
                $user->assignRole('administrator');
            } else {
                $user->assignRole('operator');
            }
        }
    }
}
