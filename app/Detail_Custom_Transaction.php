<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Custom_Transaction extends Model
{
    protected $primaryKey='id_detail_custom_transaction';
    public $timestamps = false;
    protected $table = 'detail_custom_transaction';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_transaction', 'id_coffin','id_color','id_pattern','id_accessories','id_pattern_custom','id_color_custom'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    public function coffin()
    {
        return $this->belongsTo('App\Coffin','id_coffin');
    }
    public function color()
    {
        return $this->belongsTo('App\Color','id_color');
    }
    public function pattern()
    {
        return $this->belongsTo('App\Pattern','id_pattern');
    }
    public function accessories()
    {
        return $this->belongsTo('App\Accessories','id_accessories');
    }
    public function pattern_custom(){
        return $this->belongsTo('App\Pattern_Custom','id_pattern_custom');
    }
    public function color_custom(){
        return $this->belongsTo('App\Color_Custom','id_color_custom');
    }
}
