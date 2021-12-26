<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;*/

class Categories extends Model{
    protected $table = 'categories';
    protected $fillable = ['slug', 'title'];
}