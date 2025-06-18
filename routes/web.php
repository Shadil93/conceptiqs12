<?php

use App\Http\Controllers\Configuration\SideBarController;
use App\Http\Controllers\Configuration\NavBarController;
use App\Http\Controllers\Configuration\DatabaseConfigurationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Configuration\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Configuration\CrudOperationController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\ServiesController;
use Illuminate\Support\Facades\Storage;

Artisan::call('cache:clear');
Artisan::call('view:clear');
Artisan::call('route:clear');
Artisan::call('config:clear');
Route::get("/storage-link", function () {
  $targetFolder = storage_path('app/public');
  $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
  symlink($targetFolder, $linkFolder);
});

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


Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/sidemenu',[HomeController::class,'sidemene'])->name('sidemenu');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/services',[HomeController::class,'services'])->name('services');
Route::get('/portfolio',[HomeController::class,'portfolio'])->name('portfolio');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'Adminlogin']);
Route::get('logout', [LoginController::class, 'logout'])->name('login');

  Route::get('/notification',[HomeController::class,'notification'])->name('notification');
// Route::post('/contactsubmit',[MailController::class,'contactsubmit'])->name('contactsubmit');
// Route::get('/recaptcha',[HomeController::class,'recaptcha'])->name('recaptcha');
// Route::get('/generate-captcha',[HomeController::class, 'generateCaptcha'])
 Route::post('/contactsubmit', [MailController::class, 'submit'])->name('contactsubmit');
Route::get('/test-email', [MailController::class, 'testEmail'])->name('test.email');



Route::group(['middleware' => ['auth']], function () {

  Route::get('/dashboard', [LoginController::class, 'dashboard']);
  Route::POST('adminChangePassword', [LoginController::class, 'changePassword']);
   Route::post('/crop-image-upload-ajax', [DatabaseController::class, 'cropImageUploadAjax'])->name('crop-image-upload-ajax');

Route::POST('/crop-image-upload', [DatabaseController::class, 'cropImageUpload'])->name('crop-image-upload');

Route::POST('/upload-cropped-image', [PortfolioController::class, 'uploadCroppedImage'])->name('upload-cropped-image');
Route::resource('blog', BlogController::class);


// portfolio view
Route::get('/portfolio/blog', [BlogController::class, 'index'])->name('portfolio.blog');
Route::post('/portfolio/blog/store', [BlogController::class, 'store'])->name('portfolio.blog.store');
Route::put('/portfolio/blog/{id}', [BlogController::class, 'update'])->name('portfolio.blog.update');
Route::delete('/portfolio/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('portfolio.blog.destroy');
Route::post('/portfolio/crop-image-upload-ajax', [BlogController::class, 'cropImageUploadAjax'])->name('portfolio.crop-image-upload-ajax');






//servies
Route::get('/servies', [ServiesController::class, 'index'])->name('servies.index');
Route::post('/servies/store',[ServiesController::class,'store'])->name('servies.store');
 Route::put('/servies/update/{id}',[ServiesController::class,'update'])->name('servies.update');
Route::post('/servies/delete/{id}/', [ServiesController::class, 'delete'])->name('servies.delete');


// Route::post('/servies/destroy',[ServiesController::class,'destroy'])->name('servies.destroy');
  Route::prefix("admin")->group(function () {
    // main donfiguration start 
    Route::get('profile', [LoginController::class, 'profile']);
    Route::post('profile', [LoginController::class, 'profileUpdate']);


});
});