<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'pick_up_number'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
