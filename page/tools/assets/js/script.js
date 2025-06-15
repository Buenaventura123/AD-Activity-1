function filterType(type) {
    const items = document.querySelectorAll('.product');
    items.forEach(item => {
        item.style.display = (type === 'all' || item.dataset.type === type) ? 'block' : 'none';
    });
}
