window.onload = function () {
    const toast = document.querySelector('.edit-book-message');
    if (toast) {
        toast.classList.add('show');
        setTimeout(function () {
            toast.classList.remove('show');
        }, 2000);
    }
};