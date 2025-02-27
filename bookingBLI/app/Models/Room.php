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

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
        
    public function times()
    {
        return $this->hasMany(Time::class, 'room_id'); 
    }

    public function books()
    {
        return $this->hasMany(Books::class, 'room_id');
    }

    public function bookCount()
    {
        return $this->books()->count();
    }
}
