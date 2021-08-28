<h1>Página Single</h1>

@if(!empty($property))
  @foreach($property as $prop)
      <h2>Título do imóvel: {{ $prop->title }}</h2>

      <p>Descriçao: {{ $prop->description }}</p>
      <p>Valor de locaçao: R$ {{ number_format($prop->rental_price, 2, ',', '.') }}</p>
      <p>Valor de venda: R$ {{  number_format($prop->sale_price, 2, ',', '.') }}</p>
  @endforeach
@endif
