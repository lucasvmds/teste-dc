import { Ajax } from "../../support/ajax";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll<HTMLButtonElement>('table button').forEach(node => {
        node.addEventListener('click', deleteOrRestoreCustomer);
    });
}, {once: true});

function deleteOrRestoreCustomer(event: Event): void
{
    const BUTTON = event.currentTarget as HTMLButtonElement;
    Ajax.request({
        url: `/customers/${BUTTON.dataset.id}`,
        method: 'DELETE',
    });
}