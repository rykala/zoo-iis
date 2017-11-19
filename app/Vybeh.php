<?php

namespace App;

class Vybeh extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false; // pokud je true vytvori created_at a updated_at timestamp

    public $table = 'vybeh';
}
