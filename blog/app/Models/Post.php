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
    public $with =['category','author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when(
           $filters['search'] ?? false, 
           fn($query, $search) =>
              $query->where('title', 'like',"%$search%")
              ->orWhere('resumen', 'like', "%$search%")
        );
/*
        return $query->when(
            $filters['category'] ?? false,
            fn ($query,$category) =>
            $query
                  ->whereExists(function ($query) {
                      $query
                            ->from('categories')
                            ->whereColumn('categories.id','posts.category_id')
                            ->where('categories.slug', $category);
                  } )
        );*/
        
      /* if (isset($filters['search']))
        {
           return  $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('resumen', 'like', '%' . request('search') . '%');
            }*/

            return $query->when(
                $filters['category'] ?? false,
                fn ($query,$category) =>
                $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category))
            );
    }
    //hasOne, hasMany, belongTo, belongsToMany  
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');        
    }
}
