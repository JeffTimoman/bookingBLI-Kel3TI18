<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public function RoomType(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
