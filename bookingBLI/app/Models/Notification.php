<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    const TYPE_APPROVED = 1;
    const TYPE_REJECTED = -1;

    protected $fillable = ['user_id', 'message', 'type', 'read'];
}
