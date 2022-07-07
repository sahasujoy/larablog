<?php


use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// ::::::::::::::::::::::::::::::::::::::Basic Routes:::::::::::::::::::::::::::::::::::::::::::::
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontendController::class, 'index']);

Route::get('/tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);

Route::get('tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

// ::::::::::::::::::::::::::::::::::Comments::::::::::::::::::::::::::::::::::::
Route::post('/comments', [CommentController::class, 'index']);




//::::::::::::::::::::::::::::Backend Routes::::::::::::::::::::::::::::::::::::
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group( function() {

    Route::get('/dashboard', [DashboardController::class, 'index']);


    // ----------------------------Category Routes--------------------------------------
    Route::get('/category', [CategoryController::class, 'index']);

    Route::get('/add-category', [CategoryController::class, 'create']);

    Route::post('/add-category', [CategoryController::class, 'store']);

    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);

    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);

    //Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);
    Route::post('/delete-category', [CategoryController::class, 'destroy']);


    // ------------------------------Post Routes--------------------------------------------
    Route::get('/posts', [PostController::class, 'index']);

    Route::get('/add-post', [PostController::class, 'create']);

    Route::post('/add-post', [PostController::class, 'store']);

    Route::get('/post/{post_id}', [PostController::class, 'edit']);

    Route::put('/update-post/{post_id}', [PostController::class, 'update']);

    Route::get('/delete-post/{post_id}', [PostController::class, 'destroy']);


    // ---------------------------User Routes-------------------------------------
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/user/{user_id}', [UserController::class, 'edit']);

    Route::put('/update-user-role/{user_id}', [UserController::class, 'update']);

});
