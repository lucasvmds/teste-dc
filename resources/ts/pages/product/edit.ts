import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-edit-product')?.addEventListener('submit', editProduct);
}, {once: true});

function editProduct(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: `/products/${FORM.dataset.id}`,
        method: 'PATCH',
        body: new FormData(FORM),
    });
}