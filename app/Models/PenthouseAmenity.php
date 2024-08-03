<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenthouseAmenity extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'penthouses_amenities';

    protected $fillable = [
        'penthouse_id',
        'amenity_id',
    ];

    
  
    public function penthouse()
    {
        return $this->belongsTo(Penthouse::class, 'penthouse_id');
    }
  
    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id');
    }

}
