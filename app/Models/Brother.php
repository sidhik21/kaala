<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brother extends Model
{
    protected $fillable = ['name', 'password'];
    protected $hidden = ['password'];
}
