<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color_Custom extends Model
{
    protected $primaryKey='color_custom_id';
    public $timestamps = false;
    protected $table = 'color_custom';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color_custom_id','color_custom_name','color_custom_file','color_custom_price'
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
