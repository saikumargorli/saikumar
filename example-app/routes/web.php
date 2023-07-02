<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\stringcontroller;

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


Route::get('/calculator/form', [CalculatorController::class, 'form']);
Route::get('/calculator/result', [CalculatorController::class, 'result']);
Route::get('/calculator/logs', [CalculatorController::class, 'logs']);

Route::get('/string/form', function () {
});

Route::get('/string/result', function () {
});

