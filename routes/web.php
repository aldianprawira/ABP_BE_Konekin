<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BuyContentController;
use App\Http\Controllers\ContentDetailController;
use App\Http\Controllers\PaymentFormController;
use App\Http\Controllers\VideoContentController;
use App\Http\Controllers\AudienceProfileController;
use App\Http\Controllers\CreateContentController;
use App\Http\Controllers\ContentDetailFormController;
use App\Http\Controllers\UploadContentController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ForumController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[HomeController::class,'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//route reset password
Route::get('/password/reset', [PasswordResetController::class, 'index'])->middleware('auth')->name('password.reset');

//route change to creator profile
//Route::get('/profile/creator', [ProfileController::class, 'switchToCreator'])->name('profile.creator');

//route buat forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

//route forum list of contents
Route::get('/forum/contents', [ForumController::class, 'contents'])->name('forum.contents');

//route Room Chat
Route::get('/chat/{room}', [ChatController::class, 'show'])->name('chat.room');

//route Search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

//route Search Results
Route::get('/search/results', [SearchController::class, 'index'])->name('search.results');

//route Buy Content
Route::get('/buy-content', [BuyContentController::class, 'index'])->name('buy.content');

//route Content Detail
Route::get('/content-detail/{id}', [ContentDetailController::class, 'show'])->name('content.detail');

//route Payment Form
Route::get('/payment-form', [PaymentFormController::class, 'index'])->name('payment.form');

// route for Video Content page
Route::get('/video-content', [VideoContentController::class, 'index'])->name('video.content');

// route for Content Detail page
Route::get('/content-detail/{id}', [ContentDetailController::class, 'show'])->name('content.detail');

// route for Change to Audience Profile page
Route::get('/profile/audience', [AudienceProfileController::class, 'switchToAudience'])->name('profile.audience');

// route for Create Content page
Route::get('/create-content', [CreateContentController::class, 'index'])->name('create.content');

// route for Content Detail Form page
Route::get('/content-detail-form', [ContentDetailFormController::class, 'index'])->name('content.detail.form');

// route for Upload Content page
Route::get('/upload-content', [UploadContentController::class, 'index'])->name('upload.content');


require __DIR__.'/auth.php';
