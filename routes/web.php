<?php

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Users;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ChristianController;

use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerificationMailer;




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
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ----------------------------- AUTH CONTROLLER -----------------------//
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::match(['post', 'put'], '/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

});


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function (){
    Route::get('/chat',Index::class)->name('chat.index');
    Route::get('/chat/{query}',Chat::class)->name('chat');
    Route::get('/users',Users::class)->name('users');
});

// ----------------------------- ACTIVITY-LOGS -----------------------//
Route::get('activity/log', [UserManagementController::class, 'activity'])->name('activity/log');

// ----------------------------- PRE-AUDIT -----------------------//
Route::controller(PreAuditController::class)->prefix('preaudits')->group(function () {
    Route::get('', 'index')->name('preaudits');
    Route::get('create', 'create')->name('preaudits.create');
    Route::post('store', 'store')->name('preaudits.store');
    Route::get('show/{id}', 'show')->name('preaudits.show');
    Route::get('edit/{id}', 'edit')->name('preaudits.edit');
    Route::put('edit/{id}', 'update')->name('preaudits.update');
    Route::delete('destroy/{id}', 'destroy')->name('preaudits.destroy');
});


Route::controller(ChristianController::class)->prefix('christians')->group(function () {
    Route::get('', 'index')->name('christians');
    Route::get('create', 'create')->name('christians.create');
    Route::post('store', 'store')->name('christians.store');
    Route::get('show/{id}', 'show')->name('christians.show');
    Route::get('edit/{id}', 'edit')->name('christians.edit');
    Route::put('edit/{id}', 'update')->name('christians.update');
    Route::delete('destroy/{id}', 'destroy')->name('christians.destroy');
});
Route::get('/load-christians', 'ChristianController@loadChristians')->name('load.christians');

// ----------------------------- Announcements ------------------------------//
Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('index');
    Route::get('create', [PostsController::class, 'create'])->name('create');
    Route::post('/', [PostsController::class, 'store'])->name('store');
    Route::get('show/{post}', [PostsController::class, 'show'])->name('show');
    Route::delete('destroy/{post}', [PostsController::class, 'destroy'])->name('destroy');
});


// ----------------------------- User management -----------------------//
Route::controller(UserManagementController::class)->prefix('usermanagement')->group(function () {
    Route::get('', 'index')->name('usermanagement');
    Route::get('create', 'create')->name('usermanagement.create');
    Route::post('store', 'store')->name('usermanagement.store');
    Route::get('show/{id}', 'show')->name('usermanagement.show');
    Route::get('edit/{id}', 'edit')->name('usermanagement.edit');
    Route::put('edit/{id}', 'update')->name('usermanagement.update');
    Route::delete('destroy/{id}', 'destroy')->name('usermanagement.destroy');
});

Route::get('/get-notification-count', [NotificationController::class, 'getNotificationCount']);
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

// ----------------------------- OTP -----------------------//
Route::post('reset_password', [AuthController::class,'resetPassword']);
Route::get('forgot-password', function () {
    if(Session::has('current_user')){
        return redirect('dashboard');
    }else{
        return view('forgot-password');
    }
})->middleware('guest')->name('password.request');

Route::get('re-new-password', function (){

    return view('new-password')->with('failed','Invalid OTP code');
});
Route::post('/new-password', [AuthController::class,'findUserToChangePass']);
route::get('test-mail',function(){
    // Inside your function/method
    Session::put('reset_otp_code', random_int(000000,999999));
    Mail::to('jacinto011200@gmail.com')->send(new SendVerificationMailer());
});
Route::get('/new-password', [AuthController::class, 'newPassword'])->name('new-password');
}); //end of prvent back log