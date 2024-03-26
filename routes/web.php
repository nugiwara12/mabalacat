<?php

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Users;
use App\Http\Controllers\PreAuditController;
use App\Http\Controllers\PostAuditController;
use App\Http\Controllers\EncoderController;
use App\Http\Controllers\DocumentRepController;
use App\Http\Controllers\ReleasingController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\TrustController;

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
// ----------------------------- POST-AUDIT -----------------------//
Route::controller(PostAuditController::class)->prefix('postaudits')->group(function () {
    Route::get('', 'index')->name('postaudits');
    Route::get('create', 'create')->name('postaudits.create');
    Route::post('store', 'store')->name('postaudits.store');
    Route::get('show/{id}', 'show')->name('postaudits.show');
    Route::get('edit/{id}', 'edit')->name('postaudits.edit');
    Route::put('edit/{id}', 'update')->name('postaudits.update');
    Route::delete('destroy/{id}', 'destroy')->name('postaudits.destroy');
});
// ----------------------------- ENCODER -----------------------//
Route::controller(EncoderController::class)->prefix('encoders')->group(function () {
    Route::get('', 'index')->name('encoders');
    Route::get('create', 'create')->name('encoders.create');
    Route::post('store', 'store')->name('encoders.store');
    Route::get('show/{id}', 'show')->name('encoders.show');
    Route::get('edit/{id}', 'edit')->name('encoders.edit');
    Route::put('edit/{id}', 'update')->name('encoders.update');
    Route::delete('destroy/{id}', 'destroy')->name('encoders.destroy');
});
// ----------------------------- DOCUMENT-REPRESENTATIVE -----------------------//
Route::controller(DocumentRepController::class)->prefix('documentreps')->group(function () {
    Route::get('', 'index')->name('documentreps');
    Route::get('create', 'create')->name('documentreps.create');
    Route::post('store', 'store')->name('documentreps.store');
    Route::get('show/{id}', 'show')->name('documentreps.show');
    Route::get('edit/{id}', 'edit')->name('documentreps.edit');
    Route::put('edit/{id}', 'update')->name('documentreps.update');
    Route::delete('destroy/{id}', 'destroy')->name('documentreps.destroy');
});
// ----------------------------- RELEASING -----------------------//
Route::controller(ReleasingController::class)->prefix('releasings')->group(function () {
    Route::get('', 'index')->name('releasings');
    Route::get('create', 'create')->name('releasings.create');
    Route::post('store', 'store')->name('releasings.store');
    Route::get('show/{id}', 'show')->name('releasings.show');
    Route::get('edit/{id}', 'edit')->name('releasings.edit');
    Route::put('edit/{id}', 'update')->name('releasings.update');
    Route::delete('destroy/{id}', 'destroy')->name('releasings.destroy');
});
// ----------------------------- Announcements ------------------------------//
Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('index');
    Route::get('create', [PostsController::class, 'create'])->name('create');
    Route::post('/', [PostsController::class, 'store'])->name('store');
    Route::get('show/{post}', [PostsController::class, 'show'])->name('show');
    Route::delete('destroy/{post}', [PostsController::class, 'destroy'])->name('destroy');
});


// ----------------------------- GENERAL FUNDS -----------------------//
Route::controller(GeneralController::class)->prefix('general')->group(function () {
    Route::get('', 'index')->name('generals');
    Route::get('create', 'create')->name('general.create');
    Route::post('store', 'store')->name('general.store');
    Route::get('show/{id}', 'show')->name('general.show');
    Route::get('edit/{id}', 'edit')->name('general.edit');
    Route::put('edit/{id}', 'update')->name('general.update');
    Route::delete('destroy/{id}', 'destroy')->name('general.destroy');
});

Route::get('/generals/{id}/show', [GeneralController::class, 'show']);
Route::get('/generals/{id}/show/pdf', [GeneralController::class, 'generatePdf'])->name('generals.show.pdf');



// ----------------------------- SPECIAL EDUCATIONAL FUNDS -----------------------//
Route::controller(SpecialController::class)->prefix('special')->group(function () {
    Route::get('', 'index')->name('special');
    Route::get('create', 'create')->name('special.create');
    Route::post('store', 'store')->name('special.store');
    Route::get('show/{id}', 'show')->name('special.show');
    Route::get('edit/{id}', 'edit')->name('special.edit');
    Route::put('edit/{id}', 'update')->name('special.update');
    Route::delete('destroy/{id}', 'destroy')->name('special.destroy');
});

Route::get('/special/{id}/show', [SpecialController::class, 'show']);
Route::get('/special/{id}/show/pdf', [SpecialController::class, 'generatePdf'])->name('special.show.pdf');

// ----------------------------- TRUST FUNDS -----------------------//
Route::controller(TrustController::class)->prefix('trust')->group(function () {
    Route::get('', 'index')->name('trust');
    Route::get('create', 'create')->name('trust.create');
    Route::post('store', 'store')->name('trust.store');
    Route::get('show/{id}', 'show')->name('trust.show');
    Route::get('edit/{id}', 'edit')->name('trust.edit');
    Route::put('edit/{id}', 'update')->name('trust.update');
    Route::delete('destroy/{id}', 'destroy')->name('trust.destroy');
});

Route::get('/trust/{id}/show', [TrustController::class, 'show']);
Route::get('/trust/{id}/show/pdf', [TrustController::class, 'generatePdf'])->name('trust.show.pdf');

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

