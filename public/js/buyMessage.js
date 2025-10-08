window.onload = function () {
    const toast = document.querySelector('.buy-message');
    if (toast) {
        toast.classList.add('show');
        setTimeout(function () {
            toast.classList.remove('show');
        }, 2000);
    }
};