<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    public function run()
    {
         // Создаем две обязательные записи
         Amenity::factory()->state([
            'title' => 'Первое удобство',
        ])->create();

        Amenity::factory()->state([
            'title' => 'Второе удобство',
        ])->create();

        // Создаем еще 10 рандомных записей категорий
        Amenity::factory()->count(10)->create();
    }
}
