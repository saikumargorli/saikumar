<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\stringcontroller;
use App\Http\Controllers\ConvertorController;

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
})->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 


/*
Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    $name="saikumar";
    return view('about')->with('name',$name);
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about/history', function () {
    return view('history');
});

Route::get('/gallery', function () {
    return view('gallery');
});


Route::get('/calculator/form', function () {
    return view('calculator.form');
});


Route::get('/calculator/result', function () {
    return view('calculator.result');
});

Route::get('/stringmanipulator/stringform', function () {
    return view('stringmanipulator.stringform');
});

Route::get('/stringmanipulator/stringresult', function () {
   
    $str=request()->get('str');
    $opr=request()->get('opr');
    $result=null;

    if($opr=='str')
    $result=strrev($str);
    elseif($opr=='noofw')
    $result=str_word_count($str);
    elseif($opr=='noofl')
    $result=strlen($str);
    return view('stringmanipulator.stringresult')
    ->with('result',$result)
    ->with('str',$str)
    ->with('opr',$opr);

});





Route::get('/string/form', function () {

});

Route::get('/string/result', function () {
});





Route::middleware('auth')->group(function () {
    Route::get('/calculator/form', [CalculatorController::class, 'form'])->name('calculator.form');
    Route::get('/calculator/result', [CalculatorController::class, 'result']);
    Route::get('/calculator/listall', [CalculatorController::class, 'logs'])->name('calc.logs');
    Route::get('/calculator/show/{id}', [CalculatorController::class, 'show']);
});

Route::get('/calculator/show/api/{id}', [CalculatorController::class, 'api']);
Route::get('/calculator/update/{id}', [CalculatorController::class, 'update']);
Route::post('/calculator/savedata/{id}', [CalculatorController::class, 'savedata']);
Route::post('/calculator/destroy/{id}', [CalculatorController::class, 'destroy']);
Route::get('/calculator/queries', [CalculatorController::class, 'queries']);



// always use get method to get data from server
//Route::get('/convertor/index', [ConvertorController::class, 'index']);
Route::get('/convertor', [ConvertorController::class, 'index']);
Route::get('/convertor/create', [ConvertorController::class, 'create']);
//always use post method to send data to server(first time)
Route::post('/convertor/{id}', [ConvertorController::class, 'store']);
Route::get('/convertor/{id}', [ConvertorController::class, 'show']);
Route::get('/convertor/edit/{id}', [ConvertorController::class, 'edit']);
//update an information  for existing resource or record then use put
Route::put('/convertor/{id}', [ConvertorController::class, 'update']);
//Delete an existing resource (or) record then use delete request  
Route::delete('/convertorr/{id}', [ConvertorController::class, 'destroy']);

// another option for all routes writing one route
Route::resource ('temperture',ConvertorController::class);