<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RoomAmenity extends Model
{
    use HasFactory;

    protected $table = 'rooms_amenities';

    protected $fillable = [
        'room_id',
        'amenity_id',
    ];

    
  
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
  
    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id');
    }

}
