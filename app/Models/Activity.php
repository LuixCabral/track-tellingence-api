<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'user_id',
        'activity_title',
        'activity_type',
        'activity_description',
        'distance',
        'moving_time',
        'elapsed_time',
        'total_elevation_gain',
        'average_speed',
        'average_heartrate',
        'max_heartrate',
    ];

    protected $casts= [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
