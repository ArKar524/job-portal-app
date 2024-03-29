<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'education',
        'school',
        'year',
    ];

    public function application() {
        return $this->belongsTo(Application::class);
    }
}
