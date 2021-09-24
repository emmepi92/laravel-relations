<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articol extends Model
{
    public function author() {			    
        return $this->belongsTo(Author::class);  
    }

    public function tag() {			    
        return $this->belongsToMany(Tag::class);  
    }
}

