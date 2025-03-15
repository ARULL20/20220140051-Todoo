<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index');
    }
    public function create()
    {
        return view('todo.create');
    }
    public function ecit()
    {
        return view('todo.edit');
    }
}
