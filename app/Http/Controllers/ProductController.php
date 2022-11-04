<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Product\CreateNewProduct;
use App\Actions\Product\UpdateProduct;
use App\Actions\DeleteOrRestoreModel;
use App\Http\Requests\Product\StoreUpdateRequest;
use App\Models\Product;
use App\Support\Facades\Messages;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('pages.product.index', [
            'products' => Product::withTrashed()
                ->orderBy('name')
                ->get([
                    'id',
                    'name',
                    'price',
                    'deleted_at',
                ]),
        ]);
    }

    public function create(): View
    {
        return view('pages.product.create');
    }

    public function store(StoreUpdateRequest $request): array
    {
        return [
            'success' => route('products.edit', [
                'product' => CreateNewProduct::run($request->validated()),
            ]),
        ];
    }

    public function edit(Product $product): View
    {
        return view('pages.product.edit', [
            'product' => $product,
        ]);
    }

    public function update(StoreUpdateRequest $request, Product $product): array
    {
        UpdateProduct::run(
            $request->validated(),
            $product,
        );
        return [
            'messages' => Messages::success('Produto atualizado com sucesso')->get(),
        ];
    }

    public function destroy(Product $product): array
    {
        DeleteOrRestoreModel::run($product);
        return [
            'success' => route('products.index'),
        ];
    }
}
