<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Room_Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Room_StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = new Room_Status();
        $role->id = '1';
        $role->title = 'Свободен';
        $role->timestamps = false;
        $role->save();

        $role = new Room_Status;
        $role->id = '2';
        $role->title = 'Занят';
        $role->timestamps = false;
        $role->save();

        $role = new Room_Status;
        $role->id = '3';
        $role->title = 'Требуется уборка';
        $role->timestamps = false;
        $role->save();
        
        $role = new Room_Status;
        $role->id = '4';
        $role->title = 'Не беспокоить';
        $role->timestamps = false;
        $role->save();

        $role = new Room_Status;
        $role->id = '5';
        $role->title = 'Требуется услуга';
        $role->timestamps = false;
        $role->save();

        $role = new Room_Status;
        $role->id = '6';
        $role->title = 'На ремонте';
        $role->timestamps = false;
        $role->save();
    }
}
