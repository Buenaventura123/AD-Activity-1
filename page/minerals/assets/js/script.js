document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const mineralCards = document.querySelectorAll('.mineral-card');
    
    filterMinerals('all');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            const filterType = this.getAttribute('data-type');
            filterMinerals(filterType);
        });
    });
    
    function filterMinerals(type) {
        mineralCards.forEach(card => {
            if (type === 'all' || card.getAttribute('data-type') === type) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const prices = {
        "Amethyst": 45.99,
        "Quartz": 22.50,
        "Emerald": 89.99,
        "Ruby": 120.00,
        "Sapphire": 75.25,
        "Topaz": 35.75,
        "Diamond": 299.99,
        "Opal": 85.50
    };
    
    let content = Object.entries(prices)
        .map(([name, price]) => `${name}: $${price.toFixed(2)}`)
        .join(' • ') + ' • ';
    
    content = content.repeat(3);
    
    document.querySelector('.marquee-content').textContent = content;
    
    const marquee = document.querySelector('.marquee-content');
    const duration = Math.max(20, marquee.textContent.length / 10);
    marquee.style.animationDuration = `${duration}s`;
});


const minusButtons = document.querySelectorAll('.minus');
const plusButtons = document.querySelectorAll('.plus');
const inputBoxes = document.querySelectorAll('.input-box');

minusButtons.forEach((minusButton, idx) => {
    const inputBox = inputBoxes[idx];
    if (inputBox) {
        minusButton.addEventListener('click', () => {
            inputBox.stepDown();
        });
    }
});

plusButtons.forEach((plusButton, idx) => {
    const inputBox = inputBoxes[idx];
    if (inputBox) {
        plusButton.addEventListener('click', () => {
            inputBox.stepUp();
        });
    }
});



document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.mineral-card');
    const filterButtons = document.querySelectorAll('.filter-btn');

    // Live search system
    searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const name = card.querySelector('h2').textContent.toLowerCase();
            const origin = card.querySelector('p:nth-of-type(1)').textContent.toLowerCase();
            const type = card.dataset.type;
            const description = card.querySelector('p:nth-of-type(3)').textContent.toLowerCase();

            if (
                name.includes(filter) ||
                origin.includes(filter) ||
                type.includes(filter) ||
                description.includes(filter)
            ) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Filter by category buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const type = button.dataset.type;
            
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            cards.forEach(card => {
                if (type === 'all' || card.dataset.type === type) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            searchInput.value = ''; // clear search box when filtering
        });
    });

    // Quantity increment/decrement
    document.querySelectorAll('.mineral-card').forEach(card => {
        const minus = card.querySelector('.minus');
        const plus = card.querySelector('.plus');
        const input = card.querySelector('.input-box');

        minus.addEventListener('click', () => {
            let current = parseInt(input.value);
            if (current > parseInt(input.min)) {
                input.value = current - 1;
            }
        });

        plus.addEventListener('click', () => {
            let current = parseInt(input.value);
            if (current < parseInt(input.max)) {
                input.value = current + 1;
            }
        });
    });
});
