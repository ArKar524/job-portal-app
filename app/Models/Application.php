<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'name',
        'email',
        'experience',
        'expected_salary',
        'status',
    ];

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function interviewInfo(){
        return $this->hasOne(InterviewInfo::class);
    }

    public function skill(){
        return $this->hasMany(Skill::class);
    }

    public function education(){
        return $this->hasMany(Education::class);
    }
}
