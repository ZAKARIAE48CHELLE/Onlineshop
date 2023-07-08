<?php

namespace App\Http\Controllers;
use App\Models\Supermarche_Product;
use Illuminate\Http\Request;

class SupermarcheController extends Controller
{
   
    public function index()
    {
        return view('marche.index', [
            'products' => Supermarche_Product::all()
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
            'product-price' => ['required', 'integer'],
            'product-quantity' => ['required', 'integer'],
            'product-description' => 'required'
        ]);
        $product = new Supermarche_Product();
        $product->product = strip_tags($request->input('product-name'));
        $product->price = strip_tags($request->input('product-price'));
        $product->quantity = strip_tags($request->input('product-quantity'));
        $product->description = strip_tags($request->input('product-description'));
        $product->image_path = strip_tags($request->input('product-picture'));
        $product->save();
        return redirect()->route('marche.index');
    }

    public function show($product)
    {
        return view('marche.show', ['product' => Supermarche_Product::findOrFail($product)]);

    }

    public function edit($product)
    {
        return view('marche.edit', ['product' => Supermarche_Product::findOrFail($product)]);

    }

    public function update(Request $request, $product)
    {
        $request->validate([
            'product-name' => 'required',
            'product-price' => ['required', 'integer'],
            'product-quantity' => ['required', 'integer'],
            'product-description' => 'required'
        ]);
        $to_update =  Supermarche_Product::findOrFail($product);
        $to_update->product = strip_tags($request->input('product-name'));
        $to_update->price = strip_tags($request->input('product-price'));
        $to_update->quantity = strip_tags($request->input('product-quantity'));
        $to_update->description = strip_tags($request->input('product-description'));
        $to_update->image_path = strip_tags($request->input('product-picture'));
        $to_update->save();
        return redirect()->route('marche.show', $product);
    }

   
    public function destroy($product)
    {
        $to_delete = Supermarche_Product::findOrFail($product);
        $to_delete->delete();
        return redirect()->route('marche.index'); 
    }
}
