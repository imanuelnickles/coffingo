<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey='id_transaction';
    /*public $timestamps = false;*/
    protected $table = 'transaction';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_users', 'receiver_name','receiver_address','receiver_telp','total','status','payment_image','reference_code','valid_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function detail_transaction()
    {
        return $this->hasOne('App\Detail_Transaction','id_transaction');
    }
    public function detail_custom_transaction()
    {
        return $this->hasOne('App\Detail_Custom_Transaction','id_transaction');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_users');
    }
}

