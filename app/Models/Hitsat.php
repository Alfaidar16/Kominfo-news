<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hitsat extends Model
{
    protected $table = 'hitsat';
    protected $guarded = ['id'];
    use HasFactory;
}
