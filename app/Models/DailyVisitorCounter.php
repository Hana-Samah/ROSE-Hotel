<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyVisitorCounter extends Model
{
    protected $fillable = ['date', 'daily_count'];
}
