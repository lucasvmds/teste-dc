type RequestMethod = 'GET' | 'POST' | 'PUT' | 'PATCH' | 'DELETE';
type RequestParams = {
    url: string;
    method?: RequestMethod;
    body?: any;
}
type ValidationErrors = {
    [key: string]: string[];
}
type FetchResponse<T> = {
    success?: boolean|string;
    errors?: ValidationErrors;
    messages?: Message[];
    data?: T;
}

import { Messages, Message } from "./messages";

export class Ajax
{
    public static async request<T = object>({url, method, body}: RequestParams): Promise<T|void|null>
    {
        return fetch(url, {
            method: method ?? 'GET',
            body,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
            .then<FetchResponse<T>>(response => response.json())
            .then<T|null>(response => {
                if (response.errors) {
                    return Promise.reject(response.errors);
                } else {
                    Ajax.cleanErrors();
                }
                if (typeof response.success === 'string') location.assign(response.success);
                if (response.messages) Messages.show(response.messages);
                return response.data ? response.data : null;
            })
            .catch(Ajax.handleErrors);
    }

    private static handleErrors(errors: ValidationErrors): void
    {
        document.querySelectorAll<HTMLElement>('[data-field]').forEach(node => {
            const KEY = node.dataset.field ?? '';
            if (KEY in errors) {
                node.classList.add('is-invalid');
                if (node.nextElementSibling) node.nextElementSibling.textContent = errors[KEY][0];
            } else {
                node.classList.remove('is-invalid');
            }
        });
    }

    private static cleanErrors(): void
    {
        document.querySelectorAll('.is-invalid').forEach(node => node.classList.remove('is-invalid'));
    }
}