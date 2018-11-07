class Validation {
    constructor() {
        this.forms = document.querySelectorAll('.form-add-edit');
    }

    init() {
        this.forms.forEach(form => {
            form.addEventListener('submit', event => {
                event.preventDefault();

                // Clear all form
                this.clearForm(form);

                // This is support for apple devices and safari browsers
                this.disableFiles(form);

                // Turn off button submit
                this.disableFormButton(form);

                // Send form
                this.sendForm(form);
            });
        });
    }

    clearForm(form) {
        form.querySelectorAll('.invalid-feedback').forEach(item => {
            item.remove();
        });

        form.querySelectorAll('.form-control.is-invalid').forEach(item => {
            item.classList.remove('is-invalid');
        });

        return true;
    }

    disableFiles(form) {
        form.querySelectorAll('input[type="file"]').forEach(file => {
            if (file.value == '') {
                file.setAttribute('disabled', true);
            }
        });

        return true;
    }

    enableFiles(form) {
        form.querySelectorAll('input[type="file"][disabled="true"]').forEach(file => {
            file.removeAttribute('disabled');
        });

        return true;
    }

    disableFormButton(form) {
        form.querySelectorAll('[type="submit"]').forEach(item => {
            item.setAttribute('disabled', true);
            item.insertAdjacentHTML('beforeEnd', ' <div class="loader"></div>');
        });
        return true;
    }

    enableFormButton(form) {
        form.querySelectorAll('[type="submit"]').forEach(item => {
            item.removeAttribute('disabled');
            item.querySelector('.loader').remove();
        });
        return true;
    }

    getFormData(form) {
        return new FormData(form);
    }

    getMethod(form) {
        return form.querySelector('[name="_method"]')? form.querySelector('[name="_method"]').getAttribute('value') : form.method;
    }

    getUrl(form) {
        return form.getAttribute('action');
    }

    getPreparedFieldName(name) {
        let splited_name = name.split('.');
        let formated_name;

        for (n in splited_name) {
            if (n == 0) {
                formated_name = splited_name[n];
            } else {
                formated_name += `[${splited_name[n]}]`;
            }
        }

        return `[name="${formated_name}"]`;
    }

    addErrorMessage(message) {
        const field = document.createElement('div');
        field.classList.add('invalid-feedback');
        field.innerText = message;

        return field;
    }

    sendForm(form) {
        axios({
            method: this.getMethod(form),
            url: this.getUrl(form),
            data: this.getFormData(form),
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(response => {
            console.log('Odpowiedź', response);
        })
        .catch(error => {
            const errors = error.response.data.errors;

            for (item in errors) {
                let field = form.querySelector(this.getPreparedFieldName(item));

                if (!field) {
                    throw `This field doesn't exists in this form: ${field}`;
                }

                field.classList.add('is-invalid');
                field.after(this.addErrorMessage(errors[item]));
            }

            // Enable files fields
            this.enableFiles(form);

            // Enabling form button
            this.enableFormButton(form);
        });
    }
}

// Initialize
(new Validation).init();
