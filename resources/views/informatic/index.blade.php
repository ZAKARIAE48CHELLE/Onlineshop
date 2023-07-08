@extends('layout')
@section('content')

<body>
    <div class="add-btn">
        <a href="{{route('informatic.create')}}"><span>+</span> Creer un nouveau post</a>

    </div>

    <div class="container">
        @if(count($products) > 0)
        <ul>
            @foreach($products as $product)
            <div class="card">
                <a href="{{route('informatic.show', ['informatic'=>$product['id']] )}}">
                    <img class="img-index" src="/images/{{$product['photo']}}" alt="">
                    <div class="-info">


                        <div class="prod-info">
                            {{$product['product_name']}}
                        </div>

                        <div class="prod-info">
                            {{$product['price']}}
                        </div>
                        
                    </div>



                </a>
            </div>


            @endforeach
        </ul>
        @else
        <h1>
            Il n'y a pas de produit à afficher</h1>
        @endif


    </div>






</body>

@endsection