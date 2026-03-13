<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connected_accounts extends Model
{
    protected $fillable = [
        'user_id',
        'strava_id',
        'strava_access_token',
        'strava_refresh_token',
        'strava_token_expires_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
