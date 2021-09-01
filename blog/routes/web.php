<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = [];
    /*$files = File::files(resource_path("posts/"));
    
    
    foreach ($files as $file){
        $document = YamlFrontMatter::parseFile($file);
        $posts[] =  new Post(
            $document->title,
            $document->resumen,
            $document->date,
            $document->body()
        );

    }*/

        $posts = cache()->rememberForever('posts.all',fn()=> Post::all()
                );

    return view('posts', [
        'posts' => $posts
    ]);
});

//MVC
Route::get('/post/{post}', function ($slug) {
return view('post', [
    'post' => Post::find($slug),
]);
})->where('post', '[A-Za-z\_-]+');

/*Route::get('/post', fn () => view('post'));*/

/*Route::get('/', fn () => view('welcome'));*/
/*Route::get('/', fn () => 'hola Segic');*/
/*Route::get('/', fn () => ['id' => 8 ,'url' => 'http://www.segic.cl']);*/