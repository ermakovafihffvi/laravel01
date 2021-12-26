<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RssList extends Model{
    
    protected $table = 'rss_list';
    protected $fillable = ['url'];

}