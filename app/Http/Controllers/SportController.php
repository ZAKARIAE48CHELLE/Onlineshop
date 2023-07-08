<?php

namespace App\Http\Controllers;
use App\Models\Product2;
use Illuminate\Http\Request;

class SportController extends Controller
{
  
    public function index()
    {
        return view('sport.index', [
            'products' => Product2::all()
        ]);
    }

  
    public function create()
    {
        return view('sport.create');
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
        $product = new Product2();
        $product->product_name = strip_tags($request->input('product-name'));
        $product->price = strip_tags($request->input('product-price'));
        $product->product_description = strip_tags($request->input('product-description'));
        $product->photo = $request->input('product-picture');

        $product->save();
        return redirect()->route('sport.index');
    }

  
    public function show($product)
    {
        return view('sport.show', ['product' => Product2::findOrFail($product)]);

    }

  
    public function edit($product)
    {
        return view('sport.edit', ['product' => Product2::findOrFail($product)]);

    }

    
    public function update(Request $request, $product)
    {
        $request->validate([
            'product-name' => 'required',
            'product-price' => ['required'],
            'product-description' => 'required',
            'product-picture' => 'required'
        ]);
        $to_update =  Product2::findOrFail($product);
        $to_update->product_name = strip_tags($request->input('product-name'));
        $to_update->price = strip_tags($request->input('product-price'));
        $to_update->product_description = strip_tags($request->input('product-description'));
        $to_update->photo = strip_tags($request->input('product-picture'));
        $to_update->save();
        return redirect()->route('sport.show', $product);
    }

    public function destroy($product)
    {
        $to_delete = Product2::findOrFail($product);
        $to_delete->delete();
        return redirect()->route('sport.index');
    }
}
