<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penthouse extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'penthouses';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category_id',
        'type_id',
    ];

    protected $with = ['category'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'penthouses_amenities');
    }

}
