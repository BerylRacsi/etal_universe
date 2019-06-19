<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    public $primaryKey = 'id';


    protected $fillable = [
        'id', 'id_product', 'size', 'waist', 'tight', 'inseam', 'knee', 'leg',
    ];
}
