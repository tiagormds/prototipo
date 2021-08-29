@extends('property.master')
@section('title', 'cadastro de imóveis')
@section('header', 'Formulário de Cadastro::Imoveis')
@section('content')

    <form action="{{ route('imoveis.store') }}" method="post">
        @csrf
        <label for="title">Título do imóvel</label>
        <input class="form-control" type="text" name="title" id="title">
        <br/>

        <label for="description">Descriçao</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
        <br/>

        <label for="rental_price">Valor de locaçao</label>
        <input class="form-control" type="text" name="rental_price" id="rental_price">
        <br/>

        <label for="sale_price">Valor de compra</label>
        <input class="form-control" type="text" name="sale_price" id="sale_price">
        <br/>

        <button class="btn btn-primary" type="submit">Cadastrar imóvel</button>
    </form>

@endsection
