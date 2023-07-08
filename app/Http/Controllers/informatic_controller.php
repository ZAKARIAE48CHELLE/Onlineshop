<?php

namespace App\Http\Controllers;
use App\Models\Product3;
use Illuminate\Http\Request;

class informatic_controller extends Controller
{
 
    public function index()
    {
     return view('informatic.index', [
        'products'=> Product3::all()
     ]);
    }
    public function create()
    {
      return view('informatic.create');
    }

     public function show($product){
   
     return view('informatic.show', ['product'=>Product3::findOrFail($product)]);
     }

    public function store(Request $request){
        $request->validate([
          'product-name'=>'required',
            'product-price' => ['required' ],
            'product-description' => 'required',
            'product-picture' => 'required'
        ]);
        if($request->hasFile('file')){
            $request->validate([
                'image_path'=> 'mimes:jpeg,bmt,jpg,png'
            ]);
            $request->file->store('images','public');  
            }
       $product= new Product3();
       $product->product_name = strip_tags($request->input('product-name'));
       $product->product_description = strip_tags($request->input('product-description'));
       $product->price = strip_tags($request->input('product-price'));
       $product->photo =$request->input('product-picture');
        $product->save();
        return redirect()->route('informatic.index');
    }

   

    public function edit($product){
        return view('informatic.edit',[ 'product' => Product3 :: findOrFail($product) ]);
    }

    public function update(Request $request, $product){
        $request->validate([
            'product-name' => 'required',
            'product-price' => ['required'],
            'product-description' => 'required',
            'product-picture'=>'required'
        ]);
        $to_update =  Product3::findOrFail($product);
        $to_update->product_name = strip_tags($request->input('product-name'));
        $to_update->price = strip_tags($request->input('product-price'));
        $to_update->product_description = strip_tags($request->input('product-description'));
        $to_update->photo = strip_tags($request->input('product-picture'));
        $to_update->save();
        return redirect()->route('informatic.show',$product);
    }

    
    public function destroy($product) {
$to_delete = Product3::findOrFail($product);
$to_delete->delete();
return redirect()->route('informatic.index');
    }
}
