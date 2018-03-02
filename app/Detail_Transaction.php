<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Transaction extends Model
{
     protected $primaryKey='id_detail_transaction';
    public $timestamps = false;
    protected $table = 'detail_transaction';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_transaction', 'id_product'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    public function product()
    {
        return $this->belongsTo('App\Product','id_product');
    }
}
