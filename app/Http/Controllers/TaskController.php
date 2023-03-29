<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        $val=0;
        $btn_val="Add Task";
        $tbl_val="Table Task";
        $tasks = DB::table('tasks')->get();
        return view('show',compact('tasks'))
        ->with('val',0)
        ->with('btn_val','Add Task')
        ->with('tbl_val','Table Task');
    }

    public function store(Request $request)
    {
        
        //dd($request);لاكتشاف مشكلة معينة 
        DB::table('tasks')->insert([
            'name'=>$request -> name,
            'created_at'=>now()
            
        ]);
        return redirect()->back()
        ->with('val',0)
        ->with('btn_val','Add Task')
        ->with('tbl_val','Table Task');
    }

    public function destroy($id)
    {
        //$valus=['','Add Task','Table Task'];
        $tasks = DB::table('tasks')->where('id',$id)->delete();
        return redirect()->back()
        ->with('val',0)
        ->with('btn_val','Add Task')
        ->with('tbl_val','Table Task');
    }
}
