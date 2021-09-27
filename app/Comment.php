<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function articol() {			    
        return $this->belongsToMany(Articol::class);  
    }
}
