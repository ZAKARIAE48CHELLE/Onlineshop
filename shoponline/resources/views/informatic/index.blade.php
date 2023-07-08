@extends('layout')
@section('content')

<body>
    <div class="add-btn">
        <a href="{{route('informatic.create')}}"><span>+</span> CREATE NEW POST</a>

    </div>

    <div class="container">
        @if(count($products) > 0)
        <ul>
            @foreach($products as $product)
            <div class="card">
                <a href="{{route('informatic.show', ['informatic'=>$product['id']] )}}">
                    <div>
                        {{$product['image_path']}}
                    </div>
                    <div>
                        {{$product['product']}}
                    </div>

                    <div>
                        {{$product['price']}}
                    </div>
                    <div>
                        {{$product['quantity']}}
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