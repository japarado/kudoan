<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Program;

class Sponsor extends Model
{
    //
    protected $table = 'sponsor';

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
