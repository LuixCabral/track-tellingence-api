<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'report_data',
        'user_id',
    ];

    protected $casts = [
        'report_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
