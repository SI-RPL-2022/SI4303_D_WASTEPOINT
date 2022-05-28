<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PointConvert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_points',
        'bank',
        'account_number',
        'conversion_result',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, j F Y - H:i');
    }
}
