@extends('property.master')
@section('title', 'Edição de imóvel')
@section('header', 'Formulário de Edição::Imoveis')
@section('content')

@php
    $property = $property[0];
@endphp


<form action="{{ route('imoveis.update', $property->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">Título do imóvel</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ $property->title }}">
    <br/>

    <label for="description">Descriçao</label>
    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $property->description }}</textarea>
    <br/>

    <label for="rental_price">Valor de locaçao</label>
    <input class="form-control" type="text" name="rental_price" id="rental_price" value="{{ $property->rental_price }}">
    <br/>

    <label for="sale_price">Valor de compra</label>
    <input class="form-control" type="text" name="sale_price" id="sale_price" value="{{ $property->sale_price }}">
    <br/>

    <button class="btn btn-primary" type="submit">Atualizar imóvel</button>
</form>

@endsection
