<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = ['id'];


    public function Kategori(){
        return $this->belongsTo(Kategori::class, 'category_id', 'id');
    }

    public function Users() {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
