<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChordChange extends Model
{
    public function userChanges() {
        // What is the foreign key's name?
        return $this->hasMany('App\UserChange', 'change_id', 'id')->latest();
    }
}
