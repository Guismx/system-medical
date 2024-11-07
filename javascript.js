const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const pages = document.querySelectorAll('.pagina'); 
let currentPage = 0;  
function updateCarousel() {
    pages.forEach((page, index) => {
        if (index === currentPage) {
            page.style.display = 'flex'; 
        } else {
            page.style.display = 'none'; 
        }
    });    
}

prevButton.addEventListener('click', () => {
    if (currentPage > 0) {
        currentPage--;
        updateCarousel();
    }
});

nextButton.addEventListener('click', () => {
    if (currentPage < pages.length - 1) {
        currentPage++;
        updateCarousel();
    }
});

updateCarousel();
