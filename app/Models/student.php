<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=[
        'name',
        'fname',
        'GFname',
        'job',
        'image',
        'phone_number',
        'ID_Cart',
        'last_name',
        'user_id',
        'province',

    ];


    public function users(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
