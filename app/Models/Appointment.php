<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_begin',
        'date_end',
        'service_id',
        'email',
        'firstname',
        'lastname',
        'tel',
        'company',
        //'is_finish',
        //'is_accept',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
