<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function showCreateForm(){
        if(auth()->check()){
            return view('create');
        }else{
            return redirect('/')->with('error', 'Sign in to continue');
        }
    }

    public function create(Request $request){
        $todoData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $todoData['title'] = strip_tags($todoData['title']);
        $todoData['description'] = strip_tags($todoData['description']);
        $todoData['user_id'] = strip_tags(auth()->id());

        $todoStatus = Todo::create($todoData);
        if ($todoStatus) {
            return redirect('/')->with('success', 'Todo successfully added');
        } else {
            return redirect('/')->with('error', 'Oops something went wrong, Todo not saved');
        }
    }

    public function showEditForm(Todo $todo){
        if(auth()->id() !== $todo['user_id']){
            return redirect('/')->with('error', 'You do not have the permission to access this page!');
        }else{
            return view('edit', ['todo' => $todo]);
        }
        
    }

    public function update(Todo $todo, Request $request){
        $postData = $request->validate([
            'title' =>'required',
            'description' =>'required',
            'status' => 'required',
        ]);

        $postData['title'] = strip_tags($postData['title']);
        $postData['description'] = strip_tags($postData['description']);
        $postData['status'] = strip_tags($postData['status']);

        $todo->update($postData);
        return redirect('/')->with('success', 'Todo updated successfully');
    }

    public function deleteTodo(Todo $todo){
        if(auth()->id() !== $todo['user_id']){
            return redirect('/')->with('error', 'You do not have the permission to remove this todo!');
        }else{
            $todo->delete();
            return redirect('/')->with('success', 'Post deleted successfully');
        }
        
    }

}
