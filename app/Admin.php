<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Import Models
use App\User;
use App\Event;

class Admin extends Model
{
    //
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
