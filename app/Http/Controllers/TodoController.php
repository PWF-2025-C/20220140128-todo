<?php
 
 namespace App\Http\Controllers;
 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Todo;
 
 class TodoController extends Controller
 {
     public function index()
     {
         $todos = Todo::all();
         // $todos = Todo::where('user_id', Auth::id())->get();
         dd($todos);
         return view("todo.index");
     }
 
     public function edit()
     {
         return view("todo.edit");
     }
     public function create()
     {
         return view("todo.create");
     }
 }