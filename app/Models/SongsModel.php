<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongsModel extends Model
{
    use HasFactory;
    protected $table = 'music_table';
    public $timestamps = false;
    public function category(){
        return $this->hasOne('App\Models\CategoryModel', 'id', 'category_id');
    }
}
