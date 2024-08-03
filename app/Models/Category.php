<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory; 

    protected $table = 'categories';

    protected $fillable = [
        'title',
    ];


    public function products():HasMany
    {
        return $this->hasMany(Penthouse::class);
    }
}
