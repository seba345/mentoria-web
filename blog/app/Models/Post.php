<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Traits 
    use HasFactory;
    //public $fillable =['title','resumen','body']; 
    public $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
