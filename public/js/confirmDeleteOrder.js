function showConfirm(id) {
  const modal = document.getElementById('confirmModal-' + id);
  if (modal) modal.style.display = 'block';
}

function closeModal(id) {
  const modal = document.getElementById('confirmModal-' + id);
  if (modal) modal.style.display = 'none';
}

window.addEventListener('click', function(e) {
  if (e.target && e.target.classList.contains('modal')) {
    e.target.style.display = 'none';
  }
});
