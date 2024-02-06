<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'website',
        'address',
        'description',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function payments() {
        return $this->hasOne(Payment::class);
    }
}
