import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#form-login')?.addEventListener('submit', loginAttempt);
}, {once: true});

function loginAttempt(event: Event): void
{
    event.preventDefault();
    const FORM = event.currentTarget as HTMLFormElement;
    Ajax.request<string[]>({
        url: '/login',
        method: 'POST',
        body: new FormData(FORM),
    });
}