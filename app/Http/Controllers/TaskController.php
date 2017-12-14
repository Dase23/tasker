<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tasks;
use App\Desks;

class TaskController extends Controller
{
    public function DelTask($id) {
      Tasks::destroy($id);
    }
    public function done($id){
      Tasks::where('id', $id)
            ->update(['state' => 'done']);
    }
    public function addTask(Request $request){
      if($request->has('task')){
          $name = $request->input('task');
          $desk = $request->input('desk');
          if (preg_match('/[^a-zA-Z0-9]+/msiu', $request)){
             $task = new Tasks;
             $task->name = $name;
             $task->state = 'Active';
             $task->desks_id = $desk;
             if($task->save()){
             return redirect('/desk/'.$desk);
             }
             else{
                 return view('error')->withError('Uncathced Exeption');
             }
          }
          else {
              return view('error')->withError('Wrong data format');
              }
        }
    }
    public function doneTasks ($id) {
        $desk = Desks::find($id);
        $tasks = $desk->tasks()->where('state', 'done')->get();
        
            $desk = Desks::find($id);
            return view('welcome')->withTasks($tasks)->withDesk($desk);
    }
    public function activeTasks ($id) {
        $desk = Desks::find($id);
        $tasks = $desk->tasks()->where('state', 'active')->get();
        
            $desk = Desks::find($id);
            return view('welcome')->withTasks($tasks)->withDesk($desk);
    }
}
