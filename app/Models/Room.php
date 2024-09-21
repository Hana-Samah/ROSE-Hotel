<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'room_title',
        'description',
        'wifi',
        'room_type',
        'price',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
}
