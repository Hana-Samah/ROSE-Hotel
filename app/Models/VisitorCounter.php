<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorCounter extends Model
{
    protected $table = 'visitor_counter';

    public static function incrementCounter()
    {
        $counter = self::firstOrCreate([]);
        $counter->count++;
        $counter->save();
    }

    public static function getCounter()
    {
        return self::firstOrCreate([])->count;
    }
}