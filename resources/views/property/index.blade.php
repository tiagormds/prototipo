<h1>Listagem de Produtos</h1>

<p><a href="{{ route('imoveis.create') }}">Cadastrar um novo imóvel</a></p>

@if(!empty($properties))

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Título</th>
                <th>Valor de locaçao</th>
                <th>Valo de Compra</th>
                <th>Açoes</th>
            </tr>
        </thead>

        <tbody>
        @foreach($properties as $property)
            <tr>
                <td>{{ $property->title }}</td>
                <td>R$ {{ number_format($property->rental_price, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($property->sale_price, 2, ',', '.') }}</td>
                <td><a href="{{ route('imoveis.show', $property->name) }}">Ver mais</a> | <a href="{{ route('imoveis.edit', $property->name) }}">Editar</a> | <a href="{{ route('imoveis.destroy', $property->name) }}">Remover</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endif

