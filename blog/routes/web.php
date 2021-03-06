<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'index']/*function () {
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
    
  )->name('home');

//MVC
Route::get('/post/{post}',[PostController::class, 'show']);




Route::get('/category/{category:slug}', function (Category $category) {
    return view('category', [
        'posts' => $category->posts->load(['category','author']),
        'categories' => Category::all(),
        'currentCategory' => $category,
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
        'categories' => Category::all(),
    ]);
} 
);
/*->where('post', '[A-Za-z\_-]+');

/*Route::get('/post', fn () => view('post'));*/

/*Route::get('/', fn () => view('welcome'));*/
/*Route::get('/', fn () => 'hola Segic');*/
/*Route::get('/', fn () => ['id' => 8 ,'url' => 'http://www.segic.cl']);*/
