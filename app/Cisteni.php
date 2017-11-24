<?php

namespace App;

class Cisteni extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // pokud je true vytvori created_at a updated_at timestamp

    public $table = 'cisteni';

//    public function getNazevTypuVybehu() {
//        return TypVybehu::find($this->idTypuVybeh)->nazev;
//    }
}
