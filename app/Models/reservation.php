<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'title', 'fname', 'lname', 'email',  'country', 'state', 'city', 'phone', 'troom', 'bed', 'nroom', 'meal', 'cin', 'cout'

    ];
}
