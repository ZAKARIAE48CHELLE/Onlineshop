<?php

namespace App\Http\Controllers;
use App\Models\Informatic_Product;
use Illuminate\Http\Request;

class informatic_controller extends Controller
{
 
    public function index()
    {
     return view('informatic.index', [
        'products'=> Informatic_Product::all()
     ]);
    }
    public function create()
    {
      return view('informatic.create');
    }

     public function show($product){
   
     return view('informatic.show', ['product'=>Informatic_Product::findOrFail($product)]);
     }

    public function store(Request $request){
        $request->validate([
          'product-name'=>'required',
            'product-price' => ['required' ,'integer'],
            'product-quantity' => ['required','integer'],
            'product-description' => 'required'
        ]);
       $product = new Informatic_Product();
        $product -> product = strip_tags($request->input('product-name'));
        $product -> price = strip_tags($request->input('product-price'));
        $product -> quantity =strip_tags( $request->input('product-quantity'));
        $product ->description = strip_tags($request->input('product-description'));
        $product->image_path = strip_tags($request->input('product-picture'));
        $product->save();
     return redirect()->route('informatic.index');
    }

   

    public function edit($product){
        return view('informatic.edit',[ 'product'=>Informatic_Product::findOrFail($product) ]);
    }

    public function update(Request $request, $product){
        $request->validate([
            'product-name' => 'required',
            'product-price' => ['required', 'integer'],
            'product-quantity' => ['required', 'integer'],
            'product-description' => 'required'
        ]);
        $to_update =  Informatic_Product::findOrFail($product);
        $to_update->product = strip_tags($request->input('product-name'));
        $to_update->price = strip_tags($request->input('product-price'));
        $to_update->quantity = strip_tags($request->input('product-quantity'));
        $to_update->description = strip_tags($request->input('product-description'));
        $to_update->image_path = strip_tags($request->input('product-picture'));
        $to_update->save();
        return redirect()->route('informatic.show',$product);
    }

    
    public function destroy($product) {
$to_delete = Informatic_Product::findOrFail($product);
$to_delete->delete();
return redirect()->route('informatic.index');
    }
}
