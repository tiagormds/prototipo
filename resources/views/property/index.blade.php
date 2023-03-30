@extends('property.master')
@section('content')
    <div class="container my-5">
        <h1>listagem de produtos</h1>

        @if(!empty($properties))
            <table class="table table-striped table-hover">
                <thead class="bg-primary text-white">
                    <td>Título</td>
                    <td>Valor de Locação</td>
                    <td>Valor de Compra</td>
                    <td colspan="3">
                        <center>Ações</center>
                    </td>
                </thead>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->title }}</td>
                        <td>R$ {{ number_format($property->rental_price, 2, ',', '.')  }}</td>
                        <td>R$ {{ number_format($property->sale_price, 2, ',', '.')  }}</td>
                        <td><a href="{{ route('imovel.show', $property->name) }}">Ver mais</a></td>
                        <td><a href="{{ route('imovel.edit', $property->name) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('imovel.destroy', $property->name) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
