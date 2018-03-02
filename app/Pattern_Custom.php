<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pattern_Custom extends Model
{
     protected $primaryKey='pattern_custom_id';
    public $timestamps = false;
    protected $table = 'pattern_custom';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pattern_custom_id','pattern_custom_name','pattern_custom_file','pattern_custom_price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    /*public function product()
    {
        return $this->belongsTo('App\Product','id_product');
    }*/
}
