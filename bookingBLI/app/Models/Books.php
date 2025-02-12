<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'user_id', 'room_id', 'time_id', 'date', 'people', 'purpose', 'status'
    ];
}
