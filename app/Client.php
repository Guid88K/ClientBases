<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';

    protected $fillable = [
        'name', 'surname','address', 'telephone','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }



}
