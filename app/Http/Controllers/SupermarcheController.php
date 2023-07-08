<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SupermarcheController extends Controller
{
   
    public function index()
    {
        return view('marche.index', [
            'products' => Product::all()
        ]);
    }

   
    public function create()
    {
        return view('marche.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product-name' => 'required',
            'product-price' => ['required'],
            'product-picture' => 'required',
     
            'product-description' => 'required'
        ]);
        if ($request->hasFile('file')) {
            $request->validate([
                'image_path' => 'mimes:jpeg,bmt,jpg,png'
            ]);
            $request->file->store('images', 'public');
        }
        $product = new Product();
        $product->product_name = strip_tags($request->input('product-name'));
        $product->price = strip_tags($request->input('product-price'));
        $product->product_description = strip_tags($request->input('product-description'));
        $product->photo = $request->input('product-picture');

        $product->save();
        return redirect()->route('informatic.index');
    }

    public function show($product)
    {
        return view('marche.show', ['product' => Product::findOrFail($product)]);

    }

    public function edit($product)
    {
        return view('marche.edit', ['product' => Product::findOrFail($product)]);

    }

    public function update(Request $request, $product)
    {
        $request->validate([
            'product-name' => 'required',
            'product-price' => ['required'],
            'product-description' => 'required',
            'product-picture' => 'required'
        ]);
        $to_update =  Product::findOrFail($product);
        $to_update->product_name = strip_tags($request->input('product-name'));
        $to_update->price = strip_tags($request->input('product-price'));
        $to_update->product_description = strip_tags($request->input('product-description'));
        $to_update->photo = strip_tags($request->input('product-picture'));
        $to_update->save();
        return redirect()->route('marche.show', $product);
    }

   
    public function destroy($product)
    {
        $to_delete = Product::findOrFail($product);
        $to_delete->delete();
        return redirect()->route('marche.index'); 
    }
}
