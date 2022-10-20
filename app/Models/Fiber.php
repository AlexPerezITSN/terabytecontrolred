<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiber extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','ip','location_id'];
}
