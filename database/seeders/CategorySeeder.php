<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
         // Создаем две обязательные записи
         Category::factory()->state([
            'title' => 'Первая категория',
        ])->create();

        Category::factory()->state([
            'title' => 'Вторая категория',
        ])->create();

        // Создаем еще 10 рандомных записей категорий
        Category::factory()->count(10)->create();
    }
}
