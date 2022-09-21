<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    // protected $fillable = [
    // 'priority','request_date','onboard_date','status','note','salary','amount','name','skill','user_id',
    // ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function block(){
        return $this->belongsTo(Block::class);
    }

}
