<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Praktikum 2 no 6
// Route::get('/hello', [WelcomeController::class,'hello']); 
Route::get('/', [WelcomeController::class,'index']);
// Route::get('/about', [WelcomeController::class,'about']);
// Route::get('articles/{id}', [WelcomeController::class,'articles']);

// Praktikum 2 no 7 Modifikasi kembali implementasi sebelumnya dengan konsep Single Action Controller
Route::get('/hello', [HomeController::class,'hello']);
Route::get('about', [AboutController::class,'about']);
Route::get('articles/{id}', [ArticleController::class,'articles']);
Route::resource('photos', PhotoController::class);

// Praktikum 3
Route::get('/greeting', [WelcomeController::class, 
'greeting']); 






// Praktikum 1
// Route::get('/hello', function () {
//     return 'Hello World';
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/', function () {
    return 'Selamat Datang';
});

// Route::get('/about', function () {
//     return '2241760010';
// });

Route::get('/user/{name}', function ($name) { 
    return 'Nama saya '.$name; 
});

Route::get('/posts/{post}/comments/{comment}', function 
($postId, $commentId) { 
return 'Pos ke-'.$postId." Komentar ke-: ".$commentId; 
});

Route::get('/articles/{id}', function ($id) {
    return "Halaman Artikel dengan ID $id";
});

Route::get('/user/{name?}', function ($name='Solikhin') { 
    return 'Nama saya '.$name; 
 }); 

 // Praktikum 2 Pada route list semua route yang berhubungan untuk crud photo sudah di generate oleh laravel
 Route::resource('photos', PhotoController::class)->only([ 
    'index', 'show' 
    ]); 
    Route::resource('photos', PhotoController::class)->except([ 
    'create', 'store', 'update', 'destroy' 
    ]); 
    
// Praktikum 3
    // Route::get('/greeting', function () { 
    //     return view('hello', ['name' => 'Solikhin']); 
    //     }); 
    // Route::get('/greeting', function () { 
    //     return view('blog.hello', ['name' => 'Solikhin']); 
    //     });

    