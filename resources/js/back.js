require('./app.js');

const globals = {
    dataDismiss: (type = null) => {
        const dismiss = document.querySelectorAll(`[data-dismiss="${type}"]`);

        dismiss.forEach((item) => {
            item.addEventListener('click', () => {
                item.closest(`.${type}`).remove();
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    globals.dataDismiss('alert');
});
