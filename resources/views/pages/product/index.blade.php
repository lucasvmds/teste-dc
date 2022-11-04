@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Produtos</h1>
        <table id="products" class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->getFormattedPrice()}}</td>
                        <td>
                            @if ($product->trashed())
                                <button type="button" data-id="{{$product->id}}" class="btn btn-secondary">
                                    Ativar
                                </button>
                            @else
                                <a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-secondary">
                                    Editar
                                </a>
                                <button type="button" data-id="{{$product->id}}" class="btn btn-secondary ms-3">
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
        <a href="{{route('products.create')}}" class="btn btn-primary">Adicionar produto</a>
    </aside>
@endsection