@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Editar Cliente</h1>
        <form id="form-edit-user" data-id="{{$customer->id}}">
            @csrf
            <x-form.input label="Nome" type="text" size="60" name="name" required value="{{$customer->name}}" />
            <br />
            <x-form.input label="CPF" type="number" name="cpf" required value="{{$customer->cpf}}" />
            <x-form.input label="Telefone com DDD" type="number" name="phone" required value="{{$customer->phone}}" />
            <br />
            <x-form.input label="Endereço" type="text" size="60" name="street" required value="{{$customer->street}}" />
            <br />
            <x-form.input label="Bairo" type="text" size="50" name="district" required value="{{$customer->district}}" />
            <br />
            <x-form.input label="Cidade" type="text" size="40" name="city" required value="{{$customer->city}}" />
            <x-form.input label="Estado" type="text" size="40" name="state" required value="{{$customer->state}}" />
        </form>
    </main>
    <aside class="btn-group" role="group">
        <button type="submit" class="btn btn-primary" form="form-edit-user">
            Salvar
        </button>
        <a href="{{route('customers.index')}}" class="btn btn-primary">
            Voltar
        </a>
    </aside>
@endsection