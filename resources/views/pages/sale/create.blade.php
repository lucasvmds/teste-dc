@extends('layout.base')
@section('content')
    <main class="container">
        <h1>Cadastrar Venda</h1>
        <form id="form-create-sale">
            @csrf
            <x-form.input label="Nome" type="text" size="60" name="name" required />
            <br />
            <x-form.input label="Preço" type="number" name="price" step=".01" min="0" required />
        </form>
    </main>

    <div class="modal fade" id="customer-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <x-form.input label="Consultar cliente" type="text" id="customer-search" name="search" required size="40" />
                <table class="table">
                    <tbody id="customer-search-results"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

    <aside class="btn-group" role="group">
        <button type="submit" class="btn btn-primary" form="form-create-sale">
            Salvar
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customer-modal">
            Pesquisar cliente
        </button>
        <a href="{{route('sales.index')}}" class="btn btn-primary">
            Voltar
        </a>
    </aside>
@endsection