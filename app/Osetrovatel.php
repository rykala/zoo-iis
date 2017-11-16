<?php

namespace App;

class Osetrovatel extends Model
{

    // můžeme navazovat query
    public function scopeEngineers ($query) {
        return $query->where('titul', 'ing')->get();
    }
}
