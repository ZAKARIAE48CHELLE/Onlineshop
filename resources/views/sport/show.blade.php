@extends('layout')
@section('content')

<body>
    <div class="container-show">
        <div class="imag-cont">
            <img src="/images/{{$product['photo']}}" alt="">

        </div>
        <div class="info-container">
            <div>
                <span>Nom de produit : </span> {{$product['product']}}
            </div>
            <div>
                <span>Prix : </span> {{$product['price']}} <span> <strong>MAD </strong> </span>
            </div>
            <div>
                <span>Quantite : </span> {{$product['quantity']}}
            </div>
            <div>
                <span>Description : </span> {{$product['description']}}
            </div>
            <div>
                <a class="btn-edit" href="{{route('sport.edit',$product->id)}}">Modifier le poste</a>
                <form action="{{route('sport.destroy',$product->id)}}" class="del-form" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="delete-btn" type="submit" value="Supprimer le poste">
                </form>


            </div>
        </div>

    </div>




</body>

@endsection