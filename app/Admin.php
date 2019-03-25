<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Import Models
use App\User;
use App\Program;

class Admin extends Model
{
    protected $table = 'admin';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
