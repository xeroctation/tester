<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainsModel extends Model
{
    use HasFactory;
    protected $table = 'complain_table';
    public $timestamps = false;
}
