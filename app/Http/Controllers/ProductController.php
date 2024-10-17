<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'spec']);
        $this->middleware(AdminMiddleware::class)->only(['add', 'store']);
    }
    


    public function index(Request $request)
    {
     

        $cate = Category::all();
        $category = $request->input('category');
        $searchItem = $request->input('search');

        $products= Product::when($searchItem, function ($query, $searchItem) {
            return $query->where('product_name', 'like', '%' . $searchItem . '%');
        })->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })->get();

        return view('products.index', [
            'products' => $products,
            'cate' => $cate,
        ]);
    }

    public function check($id)
    {
        $productId = Product::findOrFail($id);

        return view('purchase.store', [
            'product' => $productId,
        ]);
    }


    public function spec($id)
    {
        $phone = Product::findOrFail($id);

        return view('products.spec', [
            'phone' => $phone,
        ]);
    }

    public function add()
    {
        return view('products.add');
    }
    
    public function remove($id)
    {

        $cart = session()->get('cart', []);


        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect('/');
    }



    public function addToCart($id)
    {  

        $productCart = Product::find($id);
        
        $cart = session()->get('cart', []);

        $quantity = request()->input('quantity');

        if($quantity < 1 ){
            return redirect()->back()->with('error', "Invalid quantity!");
        }


        if(isset($cart[$id])){
            $cart[$id]['quantity'] += $quantity;

        }else{
            $cart[$id] = [
                'product_name' => $productCart->product_name,
                'photo' => $productCart->photo,
                'price' => $productCart->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        if($quantity <= $productCart->stock){
            // $productCart->stock -= $quantity;
            return redirect()->back()->with('success', 'Product add to cart!');
        }else{
            return redirect()->back()->with('fail', "Stock only left $productCart->stock products!");
            
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'category_id' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
            'price' => 'required',

        ]);
        
        $imgPath = $request->photo->store('photos', 'public');

        Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'description' =>  $request->description,
            'stock' => rand(1,5),
            'photo' => $imgPath,
            'price' => $request->price,

        ]);
        return redirect('/products');
    }



 
    

}
