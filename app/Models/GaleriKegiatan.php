<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriKegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $guarded = ['id'];
}
