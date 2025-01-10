<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];


    
    public function berita(){
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

}
