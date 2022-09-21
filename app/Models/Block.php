<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = [
        'block_name',
    ];
    function job(){
        return $this->hasMany(Job::class);
    }
    function group(){
        return $this->hasMany(Group::class);
    }
}
