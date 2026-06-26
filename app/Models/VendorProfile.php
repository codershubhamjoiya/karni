<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorProfile extends Model
{
    protected $fillable = [
        'user_id',
        'shop_name',
        'shop_description',
        'logo',
        'bank_account',
        'upi_id',
        'commission_rate',
        'status',
        'total_earnings',
        'total_paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
