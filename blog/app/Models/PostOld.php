<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class PostOld
{
        public string $title;
        public string $resumen;
        public String $date;
        public String $slug;
        public String $body;
        
        public function __construct($title, $resumen, $date, $slug, $body)
        {
         
            $this->title = $title;
            $this->resumen = $resumen;
            $this->date = $date;
            $this->slug = $slug;
            $this->body = $body;
        }
                public static function createFromDocument($document)
                {
                        return new self(
                            $document->title,
                            $document->resumen,
                            $document->date,
                            $document->slug,
                            $document->body()
                        );   
                }

        public static function all()
        {

            return collect(File::files(resource_path("posts/")))    
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => PostOld::createFromDocument($document));
        }


        public static function find($slug)
        {
    //larabel dd()  ddd() para depurar
    //$path = __DIR__ . "/../resources/posts/$slug.html";
            return cache()->remember("post.{$slug}", now()->addDays(1) , fn() => static::all()->firstWhere('slug', $slug));
/*
    if (!file_exists($path= resource_path("posts/{$slug}.html"))){
        //abort(404);
        
        throw new ModelNotFoundException();
    }
    return cache()->remember("post.{$slug}",1000, fn() => file_get_contents($path));
*/
      }

}