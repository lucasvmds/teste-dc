@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Clientes</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Cidade/Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->street}}</td>
                        <td>{{$customer->city}}/{{$customer->state}}</td>
                        <td>
                            @if ($customer->trashed())
                                <button type="button" data-id="{{$customer->id}}" class="btn btn-secondary">
                                    Ativar
                                </button>
                            @else
                                <a href="{{route('customers.edit', ['customer' => $customer->id])}}" class="btn btn-secondary">
                                    Editar
                                </a>
                                <button type="button" data-id="{{$customer->id}}" class="btn btn-secondary ms-3">
                                    Desativar
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nennhum registro encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    <aside class="btn-group" role="group">
        <a href="{{route('customers.create')}}" class="btn btn-primary">Adicionar cliente</a>
    </aside>
@endsection