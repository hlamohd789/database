<?php
use App\Http\Controllers\TaskController;
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

Route::get('show', [TaskController::class,'index'])->name('tasks');
Route::delete('delete/{id}',[TaskController::class,'destroy'] )->name('task.delete');
Route::post('insert',[TaskController::class,'store'] )->name('task.insert');

Route::post('update/{id}', function ($id) {
    $taskss = DB::table('tasks')->where('id',$id)->get();
    $tasks = DB::table('tasks')->get();
    return view('index',compact(['tasks','taskss']))
    ->with('val',1)
    ->with('btn_val','Update')
    ->with('tbl_val','Update Task');
});

Route::post('up/{id}', function ($id){
    
    DB::table('tasks')->where('id', $id)
    ->update(['name'=>$_POST['name']]);
    return redirect('/')   
    ->with('val',0)
    ->with('btn_val','Add Task')
    ->with('tbl_val','Table Task');
});

//up/{{$task->id}}/{{$task->name}}

Route::get('/', function () {
    $tasks = DB::table('tasks')->get();
    return view('index',compact('tasks'))
    ->with('val',0)
    ->with('btn_val','Add Task')
    ->with('tbl_val','Table Task');
});

Route::get('front', function () {
    
    return view('layout.front');
});