<?php

namespace App;

class Osetrovatel extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // pokud je true vytvori created_at a updated_at timestamp

    // můžeme navazovat query
    public function scopeEngineers ($query) {
        return $query->where('titul', 'ing')->get();
    }
}
