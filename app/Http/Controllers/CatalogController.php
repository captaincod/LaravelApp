<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\Product;

class CatalogController extends Controller
{
        public function index(Request $request)
        {
            $posts = Product::->paginate();
            return view('products', compact('products'));
        }

        public function show(Request $request, $id)
        {
            $post = Product::where('id',$id)
                ->firstOrFail();

            eturn view('product', compact('product))
}
