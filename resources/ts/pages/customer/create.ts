import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-create-user')?.addEventListener('submit', createUser);
}, {once: true});

function createUser(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: '/customers',
        method: 'POST',
        body: new FormData(FORM),
    });
}