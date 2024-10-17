<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Spec;

class SpecController extends Controller
{
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class)->only(['create', 'add']);
    }
    
    public function create(Request $request, $id)
    {
        
        $validated = $request->validate([

            'display' => 'required',
            'modal' => 'required',
            'processor' => 'required',
            'storage' => 'required',
            'camera' => 'required',
            'battery' => 'required',
            'graphic' => 'required',
            'os' =>  'required',
        ]);

  
        $spec = Product::findOrFail($id);

        Spec::create([ 
            'modal' => $request->modal,
            'display' => $request->display,
            'processor' => $request->processor,
            'storage' => $request->storage,
            'camera' => $request->camera,
            'battery' => $request->battery,
            'graphic' => $request->graphic,
            'os' =>  $request->os,
            "product_id" => $spec->id,
        ]);
 
        return view("products.detail", [
            'spec' => $spec
        ]);
    }

    public function add($id)
    {
        $data = Product::findOrFail($id);

        return view("products.detail", [
            'data' => $data
        ]);
    }

}
