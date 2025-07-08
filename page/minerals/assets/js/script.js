document.addEventListener("DOMContentLoaded", () => {
    const filter = document.getElementById("typeFilter");
    const cards = document.querySelectorAll(".card");

    filter.addEventListener("change", () => {
        const selected = filter.value;
        cards.forEach(card => {
            const type = card.getAttribute("data-type");
            card.style.display = (selected === "all" || selected === type) ? "block" : "none";
        });
    });
});