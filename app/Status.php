<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = 'status';
    protected $fillable = [
        'name',
    ];

//    public function attendance(){
//        return $this->belongsToMany('App\Attendance');
//    }
}
