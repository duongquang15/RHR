<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_name', 'description',
    ];
    // function tickets(){
    //     return $this->hasMany('App\Ticket');
    // }
    // function jobs(){
    //     return $this->belongsToMany('App\Job','job_level');
    // }
}
