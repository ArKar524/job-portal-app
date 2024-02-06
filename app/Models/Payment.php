<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'image',
        'transaction_number',
        'status'
    ];
    public function employer() {
        return $this->hasOne(Employer::class);
    }
}
