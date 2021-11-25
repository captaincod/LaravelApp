<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return '<h1>Hello world</h1>';
    };
    public function user()
    {
        return '<h1>Hello ' . $user . '!</h1>';
    };
}
