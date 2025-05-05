<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdcutRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        return view('index', compact('products'));
    }


    public function search(Request $request)
    {
        $query = Product::query()->keywordSearch($request->keyword);
        
        if ($request->sort === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(6)->appends($request->all()); 

        return view('index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('seasons')->find($id);
        $allseasons = Season::all();
        return view('show', compact('product','allseasons'));
    
    }
    
    public function register()
    {
        $seasons = Season::all();
        return view('register',compact('seasons'));
    }

    public function create(ProdcutRequest $request)
    {
        $path = $request->file('image')->store('products', 'public');

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $path,
        ]);

        if ($request->has('seasons')) {
            $product->seasons()->sync($request->input('seasons'));
        }

        $products = Product::Paginate(6);
        return view('index' , compact('products'));
    }
    public function updata(ProdcutRequest $request , $productId)
    {
        if ($request->has('back')) {
            return redirect('/products');
        }

        $product = Product::findOrFail($productId);


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->hasFile('image')
                ? $request->file('image')->store('products', 'public')
                : $product->image,
        ]);
        
        $product->seasons()->sync($request->input('seasons'));

        return redirect('/products');
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}