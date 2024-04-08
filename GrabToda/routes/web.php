    <?php

use App\Http\Controllers\BookNowController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\WebGraphController;
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

    //Route::get('/', function () {
    //    return view('welcome');
    //});
    Route::get('/', [HomeController::class, 'index']);
    Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookNowController::class, 'booking'])->name('booking');
    Route::post('/booking', [BookNowController::class, 'store'])->name('bookings.store');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/total-users', [UserController::class, 'getTotalUsers']);
    Route::get('/total-bookings', [BookingApiController::class, 'getTotalBookings']);
    Route::get('/total-locations', [LocationController::class, 'getTotalLocations']);
    Route::get('/users-and-bookings-by-month', [WebGraphController::class, 'getUsersAndBookingsByMonth']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

    require __DIR__.'/auth.php';


