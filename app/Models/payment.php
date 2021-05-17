<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table  = 'payments';
    protected $fillable = [
         'fname', 'lname', 'email',  'amount', 'payment_id', 'razorpay_id', 'payment_done'

    ];
    
}
