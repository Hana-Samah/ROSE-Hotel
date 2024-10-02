<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_name',
        'review',
        'rating',
    ];

    // تعريف العلاقة مع نموذج Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    

    
}
