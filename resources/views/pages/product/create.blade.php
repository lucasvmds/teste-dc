@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Cadastrar Produto</h1>
        <form id="form-create-product">
            @csrf
            <x-form.input label="Nome" type="text" size="60" name="name" required />
            <br />
            <x-form.input label="Preço" type="number" name="price" step=".01" min="0" required />
        </form>
    </main>
    <aside class="btn-group" role="group">
        <button type="submit" class="btn btn-primary" form="form-create-product">
            Salvar
        </button>
        <a href="{{route('products.index')}}" class="btn btn-primary">
            Voltar
        </a>
    </aside>
@endsection