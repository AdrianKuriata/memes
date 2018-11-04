require('./app.js');

const globals = {
    dataDismiss: (type = null) => {
        const dismiss = document.querySelectorAll(`[data-dismiss="${type}"]`);

        dismiss.forEach((item) => {
            item.addEventListener('click', () => {
                item.closest(`.${type}`).remove();
            });
        });
    },
    validation: () => {
        const forms = document.querySelectorAll('.form-add-edit');

        forms.forEach((form) => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                // Turn off file if not selected - bugfix for apple safaris browsers
                const files = form.querySelectorAll('input[type="file"]');
                files.forEach((file) => {
                    if (file.value == '') {
                        file.setAttribute('disabled', true);
                    }
                });

                const data = new FormData(form);
                let method = form.querySelector('[name="_method"]')? form.querySelector('[name="_method"]').getAttribute('value') : form.method;
                let url = form.getAttribute('action');

                // Turn off button submit
                form.querySelector('[type="submit"]').setAttribute('disabled', true);

                axios({
                    method: method,
                    url: url,
                    data: data
                })
                .then((response) => {
                    console.log('Odpowiedź', response);
                })
                .catch((error) => {
                    form.querySelector('[type="submit"]').removeAttribute('disabled');
                    const errors = error.response.data.errors;

                    for (item in errors) {
                        let field = form.querySelector(`[name="${item}"]`);

                        field.classList.add('is-invalid');
                        const errorField = document.createElement('div');
                        errorField.classList.add('invalid-feedback');
                        errorField.innerText = errors[item];

                        field.after(errorField);
                    }
                });
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    globals.dataDismiss('alert');
    globals.validation();
});
