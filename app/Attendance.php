<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Attendance extends Model
{
    public $table = 'attendance';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'working_hours', 'user_id','status_id'
    ];

    public function status(){
        return $this->hasOne('App\Status');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
