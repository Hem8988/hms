<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_Category extends Model
{
    use HasFactory;
    protected $table = "room__categories";
    public $timestamps = false;
    // public function getRoom()
    // {
    //     return $this->hasMany('App\Room', 'idCategory', 'id');
    // }
}
