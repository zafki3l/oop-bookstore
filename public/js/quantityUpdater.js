document.querySelectorAll('.card').forEach(card => {
    const plus = card.querySelector('.plus');
    const minus = card.querySelector('.minus');
    const val = card.querySelector('.val');
    const hiddenInput = card.querySelector('input[name="quantity"]');

    let quantity = parseInt(val.innerText);

    plus.addEventListener('click', () => {
        quantity++;
        val.innerText = quantity;
        hiddenInput.value = quantity;
    });

    minus.addEventListener('click', () => {
        if (quantity > 1) {
            quantity--;
            val.innerText = quantity;
            hiddenInput.value = quantity;
        }
    });
});
