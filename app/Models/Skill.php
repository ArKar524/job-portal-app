<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'skill',
    ];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
