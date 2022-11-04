export type Message = {
    level: 'success' | 'danger' | 'warning';
    content: string;
}

export class Messages
{
    private static getContainer(): HTMLElement
    {
        const ASIDE = document.querySelector<HTMLElement>('#alerts-container');
        if (! ASIDE) throw new Error('Messages Error: Element <aside#alerts-container> not found');
        return ASIDE;
    }

    private static remoevMessage(event: Event): void
    {
        const P = event.currentTarget as HTMLParagraphElement;
        P.remove();
    }

    public static show(messages: Message[]): void
    {
        const NODES: HTMLParagraphElement[] = [];
        messages.forEach(message => {
            const P = document.createElement('p');
            P.classList.add('alert', `alert-${message.level}`);
            P.setAttribute('role', 'alert');
            P.textContent = message.content;
            P.addEventListener('click', Messages.remoevMessage);
            NODES.push(P);
        });
        Messages.getContainer()
            .append(...NODES);
    }
}