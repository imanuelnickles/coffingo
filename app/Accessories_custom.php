<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories_Custom extends Model
{
    protected $primaryKey='id_accessories_custom';
    public $timestamps = false;
    protected $table = 'accessories_custom';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_accessories_custom','accessories_custom_name','accessories_custom_file','accessories_custom_price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
   /* public function product()
    {
        return $this->belongsTo('App\Product','id_product');
    }*/
}
