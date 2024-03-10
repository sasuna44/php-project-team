document.addEventListener("DOMContentLoaded", function() {
    const decreaseBtn = document.querySelector('.decrease-btn');
    const increaseBtn = document.querySelector('.increase-btn');
    const quantityInput = document.getElementById('quantityInput');
    const closeButtons = document.querySelectorAll('.close-btn');

    decreaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (!isNaN(currentValue)) {
            quantityInput.value = currentValue + 1;
        } else {
            quantityInput.value = 1;
        }
    });

    quantityInput.addEventListener('change', function() {
        let currentValue = parseInt(quantityInput.value);
        if (isNaN(currentValue) || currentValue < 1) {
            quantityInput.value = 1;
        }
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const cartCard = this.closest('.cart-card');
            if (cartCard) {
                cartCard.remove();
            }
        });
    });
});
