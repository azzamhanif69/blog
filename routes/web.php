<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('home', [
        "tittle" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "tittle" => "About",
        "active" => "about",
        "name" => "Azzam Ezra",
        "email" => "azzamezra@gmail.com",
        "img" => "a.png"

    ]);
});


Route::get('/blog', [PostController::class, 'index']);

// halaman single post
Route::get('/post/{post:slug}', [PostController::class, 'show']);
//halaman kategori

Route::get('/categories/', function () {
    return view('categories', [
        'tittle' => "Categori Post",
        'active' => 'categories',
        'categories' => Category::all()


    ]);
});


//categori
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blog', [
        'tittle' => "Post By Category: $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),


    ]);
});
Route::get('/authors/{author:username}', function (User $author) {
    return view('blog', [
        'tittle' => "Post By Author : $author->name",
        'active' => "categories",
        'posts' => $author->post->load('category', 'author')

    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::post('/logut', [LoginController::class, 'logut']);

route::get('/dashboard/post/cekSlug', [DashboardPostController::class, 'cekslug'])->middleware('auth');
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');
