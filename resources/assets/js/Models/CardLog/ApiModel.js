export default class ApiModel
{
    constructor() {
        const csrfToken = document.getElementsByName('csrf-token')[0].getAttribute('content');
        this.headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-Token': csrfToken
        };
    }
}