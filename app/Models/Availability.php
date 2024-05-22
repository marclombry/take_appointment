<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
      'date_begin',
      'date_end'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
