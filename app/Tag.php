<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function articol() {			    
        return $this->belongsToMany(Articol::class);  
    }
}
