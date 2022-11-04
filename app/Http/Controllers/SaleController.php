<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreRequest;
use App\Models\Sale;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function index(): View
    {
        return view('pages.sale.index', [
            'sales' => Sale::all([
                'id',
                'customer_id',
            ]),
        ]);
    }

    public function create(): View
    {
        return view('pages.sale.create');
    }

    public function store(StoreRequest $request): array
    {
        return [
            'success' => route('sales.edit', [
                'sale' => 1,
            ]),
        ];
    }
}
