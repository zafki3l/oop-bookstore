window.onload = function () {
    const toast = document.querySelector('.login-message');
    if (toast) {
        toast.classList.add('show');
        setTimeout(function () {
            toast.classList.remove('show');
        }, 2000); // 2 giây
    }
};
