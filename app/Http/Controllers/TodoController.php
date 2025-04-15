<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class TodoController extends Controller
{
    use ValidatesRequests;
    public function index(){
        $todo = ToDo::all();
        return view('index')->with('todos', $todo);
    }

    public function create(){
        return view('create');
    }

    public function details(ToDo $todo){
        return view('details')->with('todo', $todo);
        // = return view('details', ['todo' => $todo]);

    }

    public function edit(ToDo $todo){
        return view('edit',['todo' => $todo]);
    }

    public function update(ToDo $todo){
        try{
            $this->validate(request(), [
                'name' => ['required'],
                'description'=> ['required']
            ]);
        } catch(ValidationException $e){
        }

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success','ToDo updated succesfully');

        return redirect('/');
    }

    public function delete(ToDo $todo){
        $todo->delete();
        return redirect('/');
    }


    // public function stroe(Request $request){ *AND DOES NOT NEED TO MODIFY ROUTE!!!*
    //         $request->validate([
    //     $data = $request->all();

    public function store(){ // blog func
        try{
            $this->validate(request(), [ // what is validate?
                'name' => ['required'], // what is the definition of ['required']?
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all(); // what is request()? where did we get it from?

        $todo = new ToDo(); // why create a new model?
        // left is field name in the DB and right is in the form/view
        $todo->name = $data['name']; // I think we created a new model *entry*
        $todo->description = $data['description'];
        $todo->save(); // what is save()?

        session()->flash('success','ToDo created succefully'); // what is session()?

        return redirect('/');
    }
}
