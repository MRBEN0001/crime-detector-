<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'crime',
        'crime_scene',
        'crime_time'
     
   
    ];
}
