<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoKegiatan extends Model
{
    use HasFactory;
    protected $table = 'video_kegiatan';
    protected $guarded = ['id'];
}
