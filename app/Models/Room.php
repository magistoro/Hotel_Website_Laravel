<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rooms';

    protected $fillable = [
        'id',
        'title',
        'description',
        'price_per_night',
        'people_count',
        'image',
        'category_id',
        'status_id',
    ];

    protected $with = ['category'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'rooms_amenities');
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Room_Status::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'room_id');
    }

}
