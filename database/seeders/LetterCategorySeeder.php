<?php

namespace Database\Seeders;

use App\Models\LetterCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letterCategories = ['Umum', 'Kependudukan', 'Pernikahan', 'Pertanahan'];
        foreach ($letterCategories as  $letterCategory) {
            LetterCategory::updateOrCreate([
                'name'  => $letterCategory,
            ]);
        }
    }
}
