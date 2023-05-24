<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;

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

Route::view('/','welcome')->name('home');
Route::view('/contact','contact')->name('contact');
// Route::view('/URL','VISTA','losDatos')->name('blog');
// Route::view('/blog','blog',['posts'=>$posts])->name('blog');

// Solo invoca controllador
//Route::get('/blog',PostController::class)->name('blog');


// METODO LISTAR
//Invoca controlador y metodo
// *** Route::get('/blog',[PostController::class,'index'])->name('posts.index');

// METODO CREAR
//CREATE: mostrar el formulario de creacion
// *** Route::get('/blog/create',[PostController::class,'create'])->name('posts.create');
//STORE: para almacenar los datos
// *** Route::post('/blog',[PostController::class,'store'])->name('posts.store');

// METODO MOSTRAR
// *** Route::get('/blog/{post}',[PostController::class,'show'])->name('posts.show');
// METODO EDITAR
// *** Route::get('/blog/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
//PUT = REEMPLAZAR //// PATCH = ACTUALIZAR
// *** Route::patch('/blog/{post}',[PostController::class,'update'])->name('posts.update');
// Tambien puede ser de esta manera 
//Route::get('/blog','App\Http\Controllers\PostController');


//METODO ELIMINAR
// *** Route::delete('/blog/{post}',[PostController::class,'destroy'])->name('posts.destroy');
///*** Route::resource('blog',PostController::class);
// Route::resource('posts',PostController::class);
Route::resource('blog',PostController::class,[
    'names'=>'posts',
    'parameters'=>['blog'=>'post']
]);   
//])->middleware('auth');




//Route::view('/about','about')->name('about');

// Route::view('/about','about')->name('about')->middleware('auth');

Route::view('/about','about')->name('about');
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function(){
//     return 'Pagina de login';
// })->name('login');

Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');


Route::view('/register','auth.register')->name('register');
Route::post('/register',[RegisteredUserController::class,'store']);

// Route::post();
// Route::patch();
// Route::put();
// Route::delete();
// Route::options();
