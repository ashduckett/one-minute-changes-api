<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChange extends Model
{
    protected $fillable = [
        'user_id',
        'count',
        'change_id'
    ];
}
