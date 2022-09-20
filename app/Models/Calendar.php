<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','start_time','end_time','user_id','meeting_id','candidate_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meeting(){
        return $this->belongsTo(Meeting::class);
    }
    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }
}
