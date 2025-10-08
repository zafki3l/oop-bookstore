function showConfirmDelete(categoryId) {
    document.getElementById('confirmModal-' + categoryId).style.display = 'block';
}

function closeDeleteModal(categoryId) {
    document.getElementById('confirmModal-' + categoryId).style.display = 'none';
}
