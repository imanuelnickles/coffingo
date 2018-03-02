<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coffin extends Model
{
    protected $primaryKey='id_coffin';
    public $timestamps = false;
    protected $table = 'coffin';
    protected $fillable = [
        'name_coffin', 'price_coffin','picture_coffin'
    ];
    protected $hidden = [
        
    ];
}
