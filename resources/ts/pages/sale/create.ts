type Customer = {
    id: number;
    name: string;
    phone: number;
    street: string;
}

import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-create-sale')?.addEventListener('submit', createSale);
    document.querySelector('#customer-search')?.addEventListener('input', searchCustomer);
}, {once: true});

function createSale(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: '/sales',
        method: 'POST',
        body: new FormData(FORM),
    });
}

function selectCustomer(event: Event): void
{
    const TR = event.currentTarget as HTMLTableRowElement;
    console.log(
        JSON.parse(TR.dataset.customer ?? '{}')
    );
}

function searchCustomer(event: Event): void
{
    const INPUT = event.currentTarget as HTMLInputElement;
    const TBODY = document.querySelector<HTMLElement>('#customer-search-results');
    if (! TBODY) return;
    
    Ajax.request<Customer[]>({
        url: '/customers/search?search='+INPUT.value.trim(),
    })
        .then(customers => {
            if (! customers) return;
            const NODES: Node[] = [];
            customers.forEach(customer => {
                const TR = document.createElement('tr');
                TR.innerHTML = `
                <td>${customer.id}</td>
                <td>${customer.name}</td>
                <td>${customer.phone}</td>
                <td>${customer.street}</td>
                `;
                TR.dataset.customer = JSON.stringify(customer);
                TR.addEventListener('click', selectCustomer);
                NODES.push(TR);
            });
            TBODY.innerHTML = '';
            TBODY.append(...NODES);
        });
}