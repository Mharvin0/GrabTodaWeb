    <?php

use App\Http\Controllers\BookNowController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
    use App\Http\Controllers\ProfileController;
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
    Route::get('/booking', [BookNowController::class, 'booking'])->name('booking');
    Route::post('/booking', [BookNowController::class, 'booking'])->name('bookings.store');
    Route::get('/book-now', [HomeController::class, 'bookToLogin'])->name('book-now');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
