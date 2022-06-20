<?php

namespace Database\Seeders;

use App\Models\NeedForLetter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeedForLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $needForLetters = ['Keringanan Biaya Perawatan Medis', 'Keringanan Biaya Pendidikan', 'Mendapatkan Bantuan Sembako', 'Menerima Zakat, Infaq dan Shodaqoh'];
        foreach ($needForLetters as  $needForLetter) {
            NeedForLetter::updateOrCreate([
                'need'  => $needForLetter,
            ]);
        }
    }
}
