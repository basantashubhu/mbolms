// jquery methods without jquery
export default (query) => {
    return {
        elements: typeof query === 'string' ? document.querySelectorAll(query) : (Array.isArray(query) ? query : [query]),
        append(html) {
            this.elements.forEach(element => {
                element.insertAdjacentHTML('beforeend', html);
            });
            return this;
        },
        html(html) {
            this.elements.forEach(element => {
                element.innerHTML = html;
            });
            return this;
        },
        on(event, handle) {
            this.elements.forEach(element => {
                element.addEventListener(event, handle, false);
            });
        },
        val(value) {
            if (value !== undefined) {
                this.elements.forEach(element => {
                    element.value = value;
                });
                return this;
            }
            return this.elements[0].value;
        },
        remove() {
            this.elements.forEach(element => {
                element.remove();
            });
        },
        attr(name, value) {
            if (value !== undefined) {
                this.elements.forEach(element => {
                    element.setAttribute(name, value);
                });
                return this;
            } else {
                return this.elements[0].getAttribute(name);
            }
        },
        selected() {
            for (let i = 0; i < this.elements.length; i++) {
                if (this.elements[i].selected) {
                    this.elements = [this.elements[i]];
                }
            }
            return this;
        },
        addClass(list) {
            this.elements.forEach(element => {
                element.classList.add(...list.split(' '));
            });
            return this;
        },
        removeClass(list) {
            this.elements.forEach(element => {
                element.classList.remove(...list.split(' '));
            });
            return this;
        },
        alert(message, title, type) {
            this.elements.forEach(element => {
                $(element.querySelector('.alert-box')).addClass(`bg-${type}-100 text-${type}-700`).removeClass('hidden');
                $(element.querySelector('.alert-box .message')).html(message || '');
                $(element.querySelector('.alert-box .title')).html(title || '');
                setTimeout(() => {
                    $(element.querySelector('.alert-box')).removeClass(`bg-${type}-100 text-${type}-700`).addClass('hidden');
                }, 10 * 1000);
            });
        },
        alertSuccess(message, title) {
            this.alert(message, title, 'green');
        },
        alertError(message, title) {
            this.alert(message, title, 'red');
        }
    }
}