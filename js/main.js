function decreaseQuantity(key) {
    const input = document.getElementById('quantity_' + key);
    let value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;
    if (value > 1) {
        value--;
        input.value = value;
        updateTotalPrice();
    }
}

function increaseQuantity(key) {
    const input = document.getElementById('quantity_' + key);
    let value = parseInt(input.value, 10);
    value = isNaN(value) ? 1 : value;
    value++;
    input.value = value;
    updateTotalPrice();
}

function updateTotalPrice() {
    let total = 0;
    document.querySelectorAll('.cart-card').forEach(function(card) {
        const price = parseFloat(card.querySelector('.cart-price span').innerText.replace('$', ''));
        const quantity = parseInt(card.querySelector('.cart-quantity input').value, 10);
        total += price * quantity;
    });
    document.getElementById('total-price').innerText = total.toFixed(2);
}

updateTotalPrice();