<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
       'candidate_name','birthday','gender','phone','email','facebook','sent_date_cv','school','cv','note','skill','experience','current_salary','desired_salary','status','job_id', 'level_id',
        ];
   

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function Calendar()
    {
        return $this->hasMany(Calendar::class);//1 nhiều đây 1 candidate có nhiều calendar
        //ô xem cái đ trongcontroller chưa, hay dữ liệu sai
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
