<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'certificate_type',
        'purpose',
        'price',
        'payment_method', // Add this line
        'payment_status',
        'status',
        'is_approved',
    ];

    protected $casts = [
        'requested_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
