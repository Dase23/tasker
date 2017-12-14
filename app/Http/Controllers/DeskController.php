<?php

namespace App\Http\Controllers;
use App\User;
use App\Desks;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index() {
        $User = User::find(session('id'));
        $desks = User::find(session('id'))->descs;
        return view ('desks')->withUser($User)->withDesks($desks);
    }
    public function GetDesk($id){
        $desk = Desks::find($id);
        if ($desk == null){
                abort(404);
            }
        else {
            $tasks = Desks::find($id)
                ->tasks;
            $desk = Desks::find($id);
            return view('welcome')->withTasks($tasks)->withDesk($desk);
        }
    }
    public function newDesk(Request $request) {
           if($request->has('task')){
          $name = $request->input('task');
          $id = session('id');
          if (preg_match('/[^a-zA-Z0-9]+/msiu', $request)){
             $desk = new Desks;
             $desk->name = $name;
             $desk->user_id = $id;
             if($desk->save()){
             return redirect('/');
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
}
