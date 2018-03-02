<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $primaryKey='id_color';
    public $timestamps = false;
    protected $table = 'color';
    protected $fillable = [
        'name_color', 'price_color','picture_color'
    ];
    protected $hidden = [
        
    ];
}
