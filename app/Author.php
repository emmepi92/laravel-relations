<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function articol() {			    
        return $this->hasMany(Articol::class);  
    }
}
