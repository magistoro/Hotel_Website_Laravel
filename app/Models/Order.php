<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'orders';
    
    protected $fillable = [
        'id',
        'user_id',
        'comment',
        'total_amount',
        'arrived_date',
        'depart_date'
    ];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
