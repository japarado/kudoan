<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Import Models
use App\User;

class Admin extends Model
{
    //
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
