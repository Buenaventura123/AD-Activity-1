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
