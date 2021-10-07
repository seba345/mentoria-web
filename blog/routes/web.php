<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


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
    Illuminate\Support\Facades\DB::listen(function($query){
        logger($query->sql, $query->bindings);
    });
    
    $posts = [];
   /* $files = File::files(resource_path("posts/"));  
    foreach ($files as $file){
        $document = YamlFrontMatter::parseFile($file);
        $posts[] =  new Post(
            $document->title,
            $document->resumen,
            $document->date,
            $document->body()
        );

    }*/

    /*    $posts = cache()->remember('posts.all',1,fn()=> Post::all()
                );*/
            
    return view('posts', [
        'posts' => Post::latest('published_at')
        ->with(['category','author'])
        ->get(),
        'categories'=> Category::all()
    ]);
});

//MVC
Route::get('/post/{post}', function (Post $post) {
return view('post', [
    'post' => $post,
]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('category', [
        'posts' => $category->posts->load(['category','author']),
        /*'posts' => Post::join('categories','categories.id','=','posts.category_id')
        ->where('posts.category_id', $category->id)
        ->latest('published_at')
        ->with(['category','author'])
        ->get()*/

    ]);
}
);

Route::get('/author/{author}', function (User $author) {
    return view('posts', [
        //eager 
        'posts' => $author->posts->load(['category','author']),
    ]);
} 
);
/*->where('post', '[A-Za-z\_-]+');

/*Route::get('/post', fn () => view('post'));*/

/*Route::get('/', fn () => view('welcome'));*/
/*Route::get('/', fn () => 'hola Segic');*/
/*Route::get('/', fn () => ['id' => 8 ,'url' => 'http://www.segic.cl']);*/
