const swiper = new Swiper('.swiper', {
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    }
});

function showVehicleDetails(name, imgSrc, description, price) {
      document.querySelector('.swiper').classList.add('hidden');
      const detail = document.getElementById('vehicleDetail');
      detail.classList.remove('hidden');

      document.getElementById('vehicleName').textContent = name;
      document.getElementById('vehicleImage').src = imgSrc;
      document.getElementById('vehicleDesc').textContent = description;
      document.getElementById('vehiclePrice').textContent = "Price: $" + price.toLocaleString();
    }

    function goBackToCarousel() {
      document.getElementById('vehicleDetail').classList.add('hidden');
      document.querySelector('.swiper').classList.remove('hidden');
    }