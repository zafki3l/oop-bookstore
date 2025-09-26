function showConfirm(bookId) {
    document.getElementById('confirmModal-' + bookId).style.display = 'block';
}

function closeModal(bookId) {
    document.getElementById('confirmModal-' + bookId).style.display = 'none';
}
