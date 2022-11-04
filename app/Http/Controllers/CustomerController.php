<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Customer\CreateNewCustomer;
use App\Actions\Customer\SearchCustomers;
use App\Actions\Customer\UpdateCustomer;
use App\Actions\DeleteOrRestoreModel;
use App\Http\Requests\Customer\StoreUpdateRequest;
use App\Models\Customer;
use App\Support\Facades\Messages;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('pages.customer.index', [
            'customers' => Customer::withTrashed()
                ->orderBy('name')
                ->get([
                    'id',
                    'name',
                    'phone',
                    'street',
                    'city',
                    'state',
                    'deleted_at',
                ]),
        ]);
    }

    public function create(): View
    {
        return view('pages.customer.create');
    }

    public function store(StoreUpdateRequest $request): array
    {
        return [
            'success' => route('customers.edit', [
                'customer' => CreateNewCustomer::run($request->validated()),
            ]),
        ];
    }

    public function edit(Customer $customer): View
    {
        return view('pages.customer.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(StoreUpdateRequest $request, Customer $customer): array
    {
        UpdateCustomer::run(
            $request->validated(),
            $customer,
        );
        return [
            'messages' => Messages::success('Cliente atualizado com sucesso')->get(),
        ];
    }

    public function destroy(Customer $customer): array
    {
        DeleteOrRestoreModel::run($customer);
        return [
            'success' => route('customers.index'),
        ];
    }

    public function search(Request $request): array
    {
        return [
            'data' => SearchCustomers::run($request->query('search', '')),
        ];
    }
}
