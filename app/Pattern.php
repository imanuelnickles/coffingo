<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    protected $primaryKey='id_pattern';
    public $timestamps = false;
    protected $table = 'pattern';
    protected $fillable = [
        'name_pattern', 'price_pattern','picture_pattern'
    ];
    protected $hidden = [
        
    ];
}
