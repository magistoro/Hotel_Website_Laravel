<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room_Status extends Model
{
    use HasFactory;

    protected $table = 'room_statuses';

    protected $fillable = [
        'title',
    ];
    
    

    public function rooms():HasMany
    {
        return $this->hasMany(Room::class);
    }

}
