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
        const HEADERS = {
            'X-Requested-With': 'XMLHttpRequest',
        };

        switch (method) {
            case 'DELETE':
                HEADERS['X-CSRF-TOKEN'] = Ajax.getCsrfToken();
                break;
            case 'PATCH':
            case 'PUT':
                body = Ajax.handleBodyForJsonRequests(body);
                HEADERS['Content-Type'] = 'application/json';
                break;
        }

        return fetch(url, {
            method: method ?? 'GET',
            body,
            headers: HEADERS,
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

    private static handleBodyForJsonRequests(body: FormData): string|undefined
    {
        if (! body) return body;

        const DATA = {};
        for (const ITEM of body.entries()) {
            DATA[ITEM[0]] = ITEM[1];
        }
        return JSON.stringify(DATA);
    }

    private static getCsrfToken(): string
    {
        const META = document.querySelector('meta[name="token"]');
        if (! META) throw new Error('Tag meta[name="token"] not found');
        return META.getAttribute('content') ?? '';
    }
}