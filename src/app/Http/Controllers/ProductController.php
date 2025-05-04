<?php

namespace App\Http\Controllers;

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
        return view('show', compact('product'));
    
    }
    
    public function register()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $addproducts = $request->all();
        Product::create($addproducts);

        $products = Product::Paginate(6);
        return view('index' , compact('products'));
    }
}