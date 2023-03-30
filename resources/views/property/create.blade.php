@extends('property.master')
@section('content')
    <div class="container my-5">
        <h1>Formulário de Cadastro de Imóveis</h1>

        <form action="{{ route('imovel.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title">Título do imóvel</label>
                <input type="text" name="title" id="title" class="form-control">

                <input type="hidden" name="name" id="name">
            </div>


            <div class="mb-3">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>


            <div class="mb-3">
                <label for="rental_price">Preço de locação</label>
                <input type="number" name="rental_price" id="rental_price" class="form-control">
            </div>


            <div class="mb-3">
                <label for="sale_price">Preço de venda</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control">
            </div>


            <button class="btn btn-primary" type="submit">Cadastrar o imóvel</button>
        </form>
    </div>
@endsection
