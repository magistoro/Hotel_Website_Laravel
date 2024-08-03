<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Room;
use App\Models\Room_Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
         // Создаем 20 комнат
         for ($i = 0; $i < 130; $i++) {
            $room = Room::create([
                'title' => $faker->sentence(3),
                'price_per_night' => $faker->numberBetween(100, 300),
                'people_count' => $faker->numberBetween(1, 4),
                'category_id' => $faker->numberBetween(1, 5),
                'status_id' => $faker->numberBetween(1, 5), // Связываем комнату со случайным статусом
            ]);

            // Для каждой комнаты добавляем 3-5 случайных удобств
            $amenities = Amenity::inRandomOrder()->take($faker->numberBetween(3, 5))->get();
            $room->amenities()->attach($amenities->pluck('id'));
        }
    }
}
