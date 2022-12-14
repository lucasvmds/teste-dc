import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-create-customer')?.addEventListener('submit', createCustomer);
}, {once: true});

function createCustomer(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: '/customers',
        method: 'POST',
        body: new FormData(FORM),
    });
}