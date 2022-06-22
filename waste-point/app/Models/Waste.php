<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Waste extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'weight',
        'category',
        'image',
        'note',
        'status',
        'pick_up_number',
        'rating',
        'feedback'
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
