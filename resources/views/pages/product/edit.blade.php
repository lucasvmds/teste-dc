@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Cadastrar Produto</h1>
        <form id="form-edit-product" data-id="{{$product->id}}">
            @csrf
            <x-form.input label="Nome" type="text" size="60" name="name" required value="{{$product->name}}" />
            <br />
            <x-form.input label="Preço" type="number" name="price" step=".01" min="0" required value="{{$product->price}}" />
        </form>
    </main>
    <aside class="btn-group" role="group">
        <button type="submit" class="btn btn-primary" form="form-edit-product">
            Salvar
        </button>
        <a href="{{route('products.index')}}" class="btn btn-primary">
            Voltar
        </a>
    </aside>
@endsection