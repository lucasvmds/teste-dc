import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-edit-customer')?.addEventListener('submit', editCustomer);
}, {once: true});

function editCustomer(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: `/customers/${FORM.dataset.id}`,
        method: 'PATCH',
        body: new FormData(FORM),
    });
}