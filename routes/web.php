<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vote\VoteController;
use Illuminate\Support\Facades\Route;
use App\Models\Candidates;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\Request;

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
    return view('welcome');
});


// For test
Route::get('/gen_keys', [AdminController::class, 'gen_keys'])->name('gen_keys');
Route::get('/test2', [AdminController::class, 'test2'])->name('test2');



// Route::get('/dashboard', function () {
//     $candidates = Candidates::all();
//     return view('dashboard', compact('candidates'));
// })->middleware(['auth', 'role:student|professor'])->name('dashboard');


Route::middleware(['auth', 'verified'], 'role:student')->middleware('verified')->prefix('/')->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/vote-now/{department?}/{candidate_role?}', [UserController::class, 'votenow'])->name('votenow');

    Route::get('/vote-now/position/{department}/{id_number}/{candidate_role}', [UserController::class, 'start_vote'])->name('position');

    Route::get('/vote-now/candidate/{position}/{candidate_role}/{election_id}', [UserController::class, 'select_candidate'])->name('select_candidate');

    Route::get('/cast_vote/{department}/{id_number}/{candidate_role}', [UserController::class, 'cast_vote'])->name('cast_vote');

    Route::post('/vote-now/store_vote', [VoteController::class, 'store_vote'])->name('store_vote');

    Route::post('/vote-now/vote', [VoteController::class, 'vote'])->name('vote');

    Route::get('/ballot/{id_number}', [UserController::class, 'ballot'])->name('ballot');

    Route::get('/application_form/{id_number}/{department}', [UserController::class, 'application_form'])->name('application_form');

    Route::post('/application_form/store_form', [UserController::class, 'store_form'])->name('store_form');
});






Route::middleware('auth', 'role:admin')->name('admin.')->prefix('/')->group(function () {

        Route::get('/admin', [AdminController::class, 'home'])->name('index');
    
        // For users
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        
        // For candidates
        Route::get('/candidates', [AdminController::class, 'candidates'])->name('candidates');

        Route::get('/candidates/search_candidates', [AdminController::class, 'search_candidates'])->name('search_candidates');

        Route::post('/candidates/search_candidates/add_candidates', [AdminController::class, 'add_candidates'])->name('add_candidates');

        Route::post('/store-candidate', [AdminController::class, 'store_candidate'])->name('store_candidate');

        Route::get('/candidates/view/{id_number}', [AdminController::class, 'review_candidate'])->name('review_candidate');

        Route::post('/candidates/view/approve-status', [AdminController::class, 'approve_status'])->name('approve_status');
        
        Route::post('/candidates/view/denied-status', [AdminController::class, 'denied_status'])->name('denied_status');

        Route::get('/candidates/approve-application', [AdminController::class, 'approve_application'])->name('approve_application');

        Route::get('/candidates/denied-application', [AdminController::class, 'denied_application'])->name('denied_application');

        // For positions
        Route::get('/positions', [AdminController::class, 'positions'])->name('positions');

        Route::get('/positions/add_position', [AdminController::class, 'add_position'])->name('add_position');

        Route::post('/store-position', [AdminController::class, 'store_position'])->name('store_position');

        Route::get('/positions/view/{department}', [AdminController::class, 'view_position'])->name('view_position');

        // For elections
        Route::get('/election', [AdminController::class, 'election'])->name('election');

        Route::get('/election/set-election', [AdminController::class, 'set_election'])->name('set_election');

        Route::get('/election/filling-of-candidacy', [AdminController::class, 'filling_of_candidacy'])->name('filling_of_candidacy');

        Route::post('/election/set-election/add-election', [AdminController::class, 'add_election'])->name('add_election');

        // For result
        Route::get('/result', [AdminController::class, 'result'])->name('result');

        Route::get('/result/winners/{department}', [AdminController::class, 'result_winners'])->name('result_winners');

        Route::get('/result/student', [AdminController::class, 'student_result'])->name('student_result');

        Route::post('/result/student/winners', [AdminController::class, 'student_get_result'])->name('student_get_result');

        Route::post('/result/student/declare-winners', [AdminController::class, 'student_winner'])->name('student_winner');

        Route::get('/result/professor', [AdminController::class, 'professor_result'])->name('professor_result');

        

        }
);

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware('auth', 'role:student|professor')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
    
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';