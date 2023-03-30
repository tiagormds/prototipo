@extends('property.master')
@section('content')
    <div class="container my-5">
        <h1>Página Single</h1>

        <h2>Imóvel: {{ $property->title }}</h2>

        <p><b>Descrição</b>: {{ $property->description }}</p>
        <p><b>Valor de Locação</b>: R$ {{ number_format($property->rental_price, 2, ',', '.')  }}</p>
        <p><b>Valor de Compra</b>: R$ {{ number_format($property->sale_price, 2, ',', '.')  }}</p>
    </div>
@endsection
