<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\VirtualAccountController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\PengumumanController;
use App\Models\User;

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

// Pages
Route::get('/', function (User $user) {
    return view('pages.index', [
        'user' => $user
    ]);
});

Route::middleware(['login', 'role:admin'])->group(function () {
    Route::get('/verification', [AdminController::class, 'indexVerification'])->name('indexVerification');
    Route::get('/proof-payment/{payment:id}', [AdminController::class, 'indexProof'])->name('proof');
    Route::get('/detail/{payment:user_id}', [AdminController::class, 'detailStore'])->name('detail');
    Route::get('/student-list', [AdminController::class, 'indexList'])->name('indexList');
    Route::post('/validateStore/{payment:user_id}', [AdminController::class, 'validateStore'])->name('validateStore');
    Route::post('/rejected/{payment:user_id}', [AdminController::class, 'rejected'])->name('rejected');
    Route::get('jawabansiswa', [PenerimaanController::class, 'wawancarasiswa'])->name('jawabansiswa');
    Route::get('data-daftar-ulang', [DaftarUlangController::class, 'admin'])->name('data-daftar-ulang');
    Route::get('detailwawancara/{id}/{id_user}/{pertanyaan}', [PenerimaanController::class, 'detailwawancara'])->name('detailwawancara');
    Route::resource('pertanyaan-wawancara', PenerimaanController::class);
    Route::resource('virtual-account', VirtualAccountController::class);

    Route::get('approvesiswa/{pertanyaan}', [PenerimaanController::class, 'approvesiswa'])->name('approvesiswa');
});

Route::middleware(['login', 'role:user'])->group(function () {
    Route::get('/payment', [AdminController::class, 'indexPayment'])->name('indexPayment');
    Route::post('/paymentStore', [AdminController::class, 'paymentStore'])->name('paymentStore');

    Route::get('data-diri', [AdminController::class, 'datadiri'])->name('data-diri');

    Route::get('uploadberkas/{id}', [PenerimaanController::class, 'uploadberkas'])->name('uploadberkas');

    Route::get('pertanyaan', [PenerimaanController::class, 'pertanyaan'])->name('pertanyaan');
    Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
    Route::get('jwbpertanyaan', [PenerimaanController::class, 'jawabanwawancara'])->name('jwbpertanyaan');
    Route::resource('daftar-ulang', DaftarUlangController::class);


    // Route::resource('uploadberkas', PenerimaanController::class);
});

Route::middleware(['login', 'role:admin,user'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

// Login
Route::get('/login', [LoginController::class, 'indexLogin'])->name('login');
Route::post('/loginStore', [LoginController::class, 'loginStore'])->name('loginStore');

// Register
Route::get('/register', [RegisterController::class, 'indexRegister'])->name('register');
Route::post('/registerStore', [RegisterController::class, 'registerStore'])->name('registerStore');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Error
Route::get('/404', [LoginController::class, 'error'])->name('error');
