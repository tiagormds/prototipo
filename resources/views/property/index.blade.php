@extends('property.master')
@section('title', 'Listagem de imóvel')
@section('header', 'Listagem de imoveis')
@section('content')
    @if(!empty($properties))

        <table class="table table-bordered table-hover table-striped">
            <thead class="bg-primary text-white">
            <tr>
                <th>Título</th>
                <th>Valor de locaçao</th>
                <th>Valo de Compra</th>
                <th colspan="3">
                    <center>Açoes</center>
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>R$ {{ number_format($property->rental_price, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($property->sale_price, 2, ',', '.') }}</td>
                    <td><a class="btn btn-sm btn-success" href="{{ route('imoveis.show', $property->name) }}">Ver
                            mais</a></td>
                    <td><a class="btn btn-sm btn-primary" href="{{ route('imoveis.edit', $property->name) }}">Editar</a>
                    </td>
                    <td><a class="btn btn-sm btn-danger"
                           href="{{ route('imoveis.destroy', $property->name) }}">Remover</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>
    @endif
@endsection

