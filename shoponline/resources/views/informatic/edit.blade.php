@extends('layout')
@section('content')

<body>
    <div class="title-c">
        <h1>edit un post </h1>
    </div>
    <div class="form-c">
        <form action="{{route('informatic.update',[$product->id])}}" method="post">
            @csrf
            @method('PUT')
            <div><label for="product-name" class="text-sm">product Name</label>
                <input type="text" name="product-name" value="{{$product['product']}}" id="product-name">
                @error('product-name')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-price" class="text-sm">product price</label>
                <input type="text" id="product-price" value="{{$product['price']}}" name="product-price">
                @error('product-price')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-quantity" class="text-sm">product quantity</label>
                <input type="text" id="product-quantity" value="{{$product['quantity']}}" name="product-quantity">
                @error('product-quantity')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-description" class="text-sm">product description</label>
                <textarea name="product-description" id="product-description" cols="30" rows="10" value="">{{$product['description']}}</textarea>
                @error('product-description')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-picture" class="text-sm">product picture</label>
                <input type="file" id="product-picture" name="product-picture" accept="image/*">
                @error('product-picture')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>

        </form>
    </div>








</body>

@endsection