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
        'activity_description',
        'activity_type',
        'average_pace',
        'average_bpm',
        'distance',
        'activity_date',
    ];

    protected $casts= [
        'activity_date' => 'datetime',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
