<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class TimeAInfoFile extends Model
{
    protected $fillable = [];
    protected $table = 'attendance_log_info';
    

}
