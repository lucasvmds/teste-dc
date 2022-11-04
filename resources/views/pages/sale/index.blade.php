@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Vendas</h1>
        <table id="sales" class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$sale->customer->name}}</td>
                        <td>
                            <a href="{{route('sales.edit', ['sale' => $sale->id])}}" class="btn btn-secondary">
                                Editar
                            </a>
                            <button type="button" data-id="{{$sale->id}}" class="btn btn-secondary ms-3">
                                Deletar
                            </button>
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
        <a href="{{route('sales.create')}}" class="btn btn-primary">Adicionar venda</a>
    </aside>
@endsection