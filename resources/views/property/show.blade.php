@extends('property.master')
@section('title', 'Página Single')
@section('content')
    @if(!empty($property))
        @foreach($property as $prop)
@section('header', 'Mais informações do imóvel: '.$prop->title)

            <ul class="list-group">
                <li class="list-group-item">Descriçao: {{ $prop->description }}</li>
                <li class="list-group-item">Valor de locaçao: R$ {{ number_format($prop->rental_price, 2, ',', '.') }}</li>
                <li class="list-group-item">Valor de venda: R$ {{  number_format($prop->sale_price, 2, ',', '.') }}</li>
            </ul>
        @endforeach
    @endif
@endsection
