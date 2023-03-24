<?php
use Illuminate\Support\Facades\DB;
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

Route::get('show', function () {
    $tasks = DB::table('tasks')->get();
    return view('show',compact('tasks'));
});
Route::post('delete/{id}', function ($id) {
    $tasks = DB::table('tasks')->where('id',$id)->delete();
    return redirect()->back();
});
Route::post('insert', function () {
    DB::table('tasks')->insert([
        'name'=>$_POST['name'],
        'created_at'=>now()
        
    ]);
    return redirect()->back();
});

Route::post('insert', function () {
    DB::table('tasks')->insert([
        'name'=>$_POST['name'],
        'created_at'=>now()
        
    ]);
    return redirect()->back();
});

Route::get('/', function () {
    $tasks = DB::table('tasks')->get();
    return view('index',compact('tasks'));
});

