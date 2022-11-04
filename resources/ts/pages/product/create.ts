import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-create-product')?.addEventListener('submit', createProduct);
}, {once: true});

function createProduct(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: '/products',
        method: 'POST',
        body: new FormData(FORM),
    });
}