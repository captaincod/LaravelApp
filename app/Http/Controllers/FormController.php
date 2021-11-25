<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SubmitRequest;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $result = $request->session()->pull('result');
        return view('form', compact('result'));
    }

    public function post(PostRequest $request)
    {
        Post::create([
            'name' => $request->name,
            'slug'=> Str::slug($request->name),
            'content' => $request->content,
            'date' => now()->format('Y-m-d'),
        ]);

        $result = 'Post is saved!'

        $request->session()->put('result',$result);

        return redirect('/form')
    }

/*
    public function post(SubmitRequest $request)
    {
        $name = $request->name;
        $city = $request->city;
        $age = $request->age;

        $filename = storage_path('data/' . uniqid() . '.json');

        file_put_contents($filename, json_encode([
            'name' => $name,
            'city' => $city,
            'age' => $age,
        ]));

        $result = 'Hello, ' . $name . '! You are from ' . $city . ', and you are ' . $age . ' y.o.';

        $request->session()->put('result', $result);

        return redirect('/form');
    }
*/

}