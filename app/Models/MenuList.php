<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    use HasFactory;

    protected $table = 'menu_items';
    protected $guarded = ['id'];


    // public function parent()
    // {
    //     return $this->belongsTo(MenuList::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(MenuList::class, 'parent_id')->orderBy('order');
    // }
}
