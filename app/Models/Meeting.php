<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'meeting_name',
    ];
    public function calendar(){
        return $this->hasMany(Calendar::class);
    }
}
