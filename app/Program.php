<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Sponsor;
use App\Speaker;

class Program extends Model
{
    //
    protected $table = 'program';

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class);
    }
}
