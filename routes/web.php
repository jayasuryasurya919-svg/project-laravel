<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\JenisKendaraanController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\User\KendaraanUserController;
use App\Http\Controllers\User\TransaksiUserController;

/*
|--------------------------------------------------------------------------
| USER (PUBLIC / NON ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/', [KendaraanUserController::class, 'index'])
    ->name('user.beranda');

Route::get('/kendaraan/{kendaraan}', 
    [KendaraanUserController::class, 'show']
)->name('user.kendaraan.show');


/*
|--------------------------------------------------------------------------
| AUTH PROFILE (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

     Route::get('/sewa/{kendaraan}',  [TransaksiController::class, 'create'] )
        ->name('user.sewa.create');

     Route::post('/sewa/{kendaraan}', 
        [TransaksiController::class, 'store'])
        ->name('user.sewa.store');

     Route::get('/transaksi-saya', [TransaksiUserController::class, 'index'])
        ->name('user.transaksi.index');

     Route::get('/admin/password', function () {
        return view('admin.password');
     })->name('admin.password.show');

     Route::post('/admin/password', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'admin_password' => ['required','string'],
        ]);

        if ($request->input('admin_password') !== config('admin.panel_password')) {
            return back()->withErrors([
                'admin_password' => 'Password admin salah.',
            ])->onlyInput('admin_password');
        }

        $request->session()->put('admin_password_ok', true);

        return redirect()->route('admin.beranda');
     })->name('admin.password.store');
});


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth','admin.password'])
    ->group(function () {

        Route::get('/beranda', [BerandaController::class, 'index'])
            ->name('beranda');

        Route::resource('kendaraan', KendaraanController::class);

        Route::resource('jenis-kendaraan', JenisKendaraanController::class);

        Route::resource('transaksi', TransaksiController::class)
            ->only(['index','create','store','edit','update','destroy']);
});


/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', function () {
    return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {

    try {
        $googleUser = Socialite::driver('google')->user();
    } catch (\Throwable $e) {
        return redirect()
            ->route('login')
            ->with('error', 'Login Google gagal. Silakan coba lagi.');
    }

    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'email_verified_at' => now(),
            'password' => bcrypt(Str::random(24)),
            'role' => 'user',
        ]
    );

    Auth::login($user);

    // 🔥 ADMIN MASUK ADMIN, USER MASUK BERANDA USER
    if ($user->role === 'admin') {
        return redirect()->route('admin.beranda');
    }

    return redirect()->route('user.beranda');
});


/*
|--------------------------------------------------------------------------
| AUTH BREEZE / DEFAULT
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
