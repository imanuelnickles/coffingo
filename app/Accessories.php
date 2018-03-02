<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $primaryKey='id_accessories';
    public $timestamps = false;
    protected $table = 'accessories';
    protected $fillable = [
        'name_accessories', 'price_accessories','picture_accessories'
    ];
    protected $hidden = [
        
    ];

}
