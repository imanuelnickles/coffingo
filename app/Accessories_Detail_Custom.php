<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories_Detail_Custom extends Model
{
     protected $primaryKey='id_accessories_detail_custom';
    public $timestamps = false;
    protected $table = 'accessories_detail_custom';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_accessories_detail_custom', 'id_detail_custom_transaction','id_accessories'
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
