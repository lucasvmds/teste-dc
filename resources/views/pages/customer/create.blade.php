@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Cadastrar Cliente</h1>
        <form id="form-create-customer">
            @csrf
            
            <x-form.input label="Nome" type="text" size="60" name="name" required />
            <br />
            <x-form.input label="CPF" type="number" name="cpf" required />
            <x-form.input label="Telefone com DDD" type="number" name="phone" required />
            <br />
            <x-form.input label="Endereço" type="text" size="60" name="street" required />
            <br />
            <x-form.input label="Bairo" type="text" size="50" name="district" required />
            <br />
            <x-form.input label="Cidade" type="text" size="40" name="city" required />
            <x-form.input label="Estado" type="text" size="40" name="state" required />
        </form>
    </main>
    <aside class="btn-group" role="group">
        <button type="submit" class="btn btn-primary" form="form-create-customer">
            Salvar
        </button>
        <a href="{{route('customers.index')}}" class="btn btn-primary">
            Voltar
        </a>
    </aside>
@endsection