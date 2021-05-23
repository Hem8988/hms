<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    //
    protected $table = "rooms";

    public $timestamps = false;

    // public function categoryRoom()
    // {
    //     return $this->belongsTo('App\Models\room_Category', 'idCategory');
    // }
}
