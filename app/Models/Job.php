<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
    'priority','request_date','onboard_date','status','note','salary','amount','name','skill','user_id',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

}
