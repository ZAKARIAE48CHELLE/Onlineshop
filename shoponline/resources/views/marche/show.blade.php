@extends('layout')
@section('content')

<body>
    <div class="container-show">
        <div class="imag-cont">
            {{$product['image_path']}}
        </div>
        <div class="info-container">
            <div>
                <span>Nome de produit : </span> {{$product['product']}}
            </div>
            <div>
                <span>prix : </span> {{$product['price']}} <span> <strong>MAD </strong> </span>
            </div>
            <div>
                <span>Quantite : </span> {{$product['quantity']}}
            </div>
            <div>
                <span> description : </span> {{$product['description']}}
            </div>
            <div>
                <a class="btn-edit" href="{{route('marche.edit',$product->id)}}">EDIT POST</a>
                <form action="{{route('marche.destroy',$product->id)}}" class="del-form" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="delete-btn" type="submit" value="DELETE POST">
                </form>


            </div>
        </div>

    </div>




</body>

@endsection