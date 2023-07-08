@extends('layout')
@section('content')

<body>
    <div class="container-show">
        <div class="imag-cont">
            <img src="/images/{{$product['photo']}}" alt="">
        </div>
        <div class="info-container">
            <div>
                <span>Nome de produit : </span> {{$product['product_name']}}
            </div>
            <div>
                <span>Prix : </span> {{$product['price']}} <span> <strong>MAD </strong> </span>
            </div>
            <div>
                <span>Description : </span> {{$product['product_description']}}
            </div>
            <div>
                <a class="btn-edit" href="{{route('informatic.edit',$product->id)}}">Modifier le poste</a>
                <form action="{{route('informatic.destroy',$product->id)}}" class="del-form" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="delete-btn" type="submit" value="Supprimer le poste">
                </form>


            </div>
        </div>

    </div>




</body>

@endsection