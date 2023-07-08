@extends('layout')
@section('content')

<body>
    <div class="title-c">
        <h1>Ajouter un produit </h1>
    </div>
    <div class="form-c">
        <form action="{{route('informatic.store')}}" method="post">
            @csrf
            <div><label for="product-name" class="text-sm">Nom de produit</label>
                <input type="text" name="product-name" value="{{old('product-name')}}" id="product-name">
                @error('product-name')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-price" class="text-sm">Prix</label>
                <input type="text" id="product-price" value="{{old('product-price')}}" name="product-price">
                @error('product-price')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-description" class="text-sm">Description</label>
                <textarea name="product-description" id="product-description" cols="30" rows="10" value="">{{old('product-description')}}</textarea>
                @error('product-description')
                <div class="form-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div><label for="product-picture" class="text-sm">Image</label>
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