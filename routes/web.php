<?php
require __DIR__ . '/queries.php';

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;



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

Route::get('/', function () {
    $videoNuevo = getNewestVideo();
    

    return view('welcome', [
        'videoNuevo' => $videoNuevo,
    ]);
});

Route::get('/nosotros', function () {
    $videoNuevo = getNewestVideo();
    

    return view('quienes_somos');
});

Route::resource('/donaciones', \App\Http\Controllers\DonacionesController::class);

//redireccionamiento al inicio de session de google
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

//recepcion de las credenciales de google
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    #dd($user_google);
    $user = User::where('email', $user_google->email)->first();

    if ($user) {
        // El usuario existe
        $updateData = [
            'google_id' => $user_google->id,
        ];

        // Verifica si los campos name y last_name están vacíos antes de actualizarlos
        if (empty($user->name)) {
            $updateData['name'] = $user_google->user['given_name'];
        }

        if (empty($user->last_name)) {
            $updateData['last_name'] = $user_google->user['family_name'];
        }

        // Verifica si 'picture' existe en el objeto $user_google antes de intentar asignarlo
        if (isset($user_google->user['picture'])) {
            $updateData['image'] = $user_google->user['picture'];
        }

        // Actualiza los campos
        $user->update($updateData);
    } else {
        // El usuario no existe, crea uno nuevo
        $newUserData = [
            'google_id' => $user_google->id,
            'name' => $user_google->user['given_name'],
            'email' => $user_google->user['email'],
            'last_name' => $user_google->user['family_name'],
        ];

        // Verifica si 'picture' existe en el objeto $user_google antes de intentar asignarlo
        if (isset($user_google->user['picture'])) {
            $newUserData['image'] = $user_google->user['picture'];
        }

        // Crea un nuevo usuario
        $user = User::create($newUserData);
    }

    /* Funcion Alterna para no permitir el ingreso de usuarios no autorizador por el administrador
    if ($user) {
        // El usuario existe
        $updateData = [
            'google_id' => $user_google->id,
        ];

        // Verifica si los campos name y last_name están vacíos antes de actualizarlos
        if (empty($user->name)) {
            $updateData['name'] = $user_google->user['given_name'];
        }

        if (empty($user->last_name)) {
            $updateData['last_name'] = $user_google->user['family_name'];
        }

        // Verifica si 'picture' existe en el objeto $user_google antes de intentar asignarlo
        if (isset($user_google->user['picture'])) {
            $updateData['image'] = $user_google->user['picture'];
        }

        // Actualiza los campos
        $user->update($updateData);
    } else {
        
        // El usuario no existe, realiza la redirección con un mensaje flash
        return redirect()->route('login')->with('error', '<strong>Hola! el usuario no está autorizado</strong><br> comuníquese a <a href="mailto:ivead.cpc@gmail.com">ivead.cpc@gmail.com</a> para solicitar su acceso');
    }
*/
    Auth::login($user);
    return redirect('/descubrir')->with('success', 'Bienvenido');
});

// Ruta para mostrar contenido de descubrir
Route::get('/descubrir', function () {
    $videoNuevo = getNewestVideo();
    $videosViejos = getOlderVideos();

    return view('dashboard.descubrir', [
        'videoNuevo' => $videoNuevo,
        'videosViejos' => $videosViejos,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard.descubrir');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
    Route::resource('/roles-y-permisos', \App\Http\Controllers\RolesYPermisosController::class);
    Route::resource('/equipos', \App\Http\Controllers\TeamsController::class);
    Route::resource('/recursos', App\Http\Controllers\ResourceController::class);
    Route::resource('/financiera', \App\Http\Controllers\GestionFinancieraController::class);
    Route::resource('/reporte-semanal', \App\Http\Controllers\ReporteSemanalController::class);
    Route::resource('/reporte-mensual', \App\Http\Controllers\ReporteMensualController::class);
});

require __DIR__ . '/auth.php';
