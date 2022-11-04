import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-edit-user')?.addEventListener('submit', editUser);
}, {once: true});

function editUser(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request({
        url: `/customers/${FORM.dataset.id}`,
        method: 'PATCH',
        body: new FormData(FORM),
    });
}