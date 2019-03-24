<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Program;

class Speaker extends Model
{
    //
    protected $table = 'speaker';

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
