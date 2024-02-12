function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    dropdownContent.classList.toggle("show");
   }
   const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        slidesPerView: "auto", 
        centerSlides: true,

        pagination: {
        el: '.swiper-pagination',
        },

        autoplay: {
            delay: 5000, 
            disableOnInteraction: false,
          },
  });

  