function showConfirm(categoryId) {
    document.getElementById('confirmModal-' + categoryId).style.display = 'block';
}

function closeModal(categoryId) {
    document.getElementById('confirmModal-' + categoryId).style.display = 'none';
}
