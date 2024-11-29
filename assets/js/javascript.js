const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const pages = document.querySelectorAll('.pagina');
let currentPage = 0;

function updateCarousel() {
    pages.forEach((page, index) => {
        page.style.display = 'none'; // Esconde todas as páginas inicialmente
        page.classList.remove('show', 'previous', 'next');
        
        if (index === currentPage) {
            page.style.display = 'flex'; // Mostra somente a página atual
            page.classList.add('show'); // Adiciona classe para estilos específicos
        } else if (index === currentPage - 1 || (currentPage === 0 && index === pages.length - 1)) {
            page.classList.add('previous'); // Adiciona classe para página anterior
        } else if (index === currentPage + 1 || (currentPage === pages.length - 1 && index === 0)) {
            page.classList.add('next'); // Adiciona classe para página seguinte
        }
    });

    // Ajusta a altura do container para corresponder à página atual
    const currentHeight = pages[currentPage].offsetHeight;
    const carouselContainer = document.querySelector('.servicos-carousel');
    carouselContainer.style.height = `${currentHeight}px`;
}

prevButton.addEventListener('click', () => {
    if (currentPage > 0) {
        currentPage--;
    } else {
        currentPage = pages.length - 1; // Volta para a última página
    }
    updateCarousel();
});

nextButton.addEventListener('click', () => {
    if (currentPage < pages.length - 1) {
        currentPage++;
    } else {
        currentPage = 0; // Vai para a primeira página
    }
    updateCarousel();
});

// Inicializa o carrossel
updateCarousel();


// BOTÃO PARA MOSTRAR MAIS E MOSTRAR MENOS (PAGINA INICIAL)
document.getElementById("toggle-cards").addEventListener("click", function () {
    const additionalCards = document.querySelector(".additional-cards");
    const text = this.querySelector(".toggle-text");
    const arrow = this.querySelector(".toggle-arrow");

    if (additionalCards.style.display === "none") {
        additionalCards.style.display = "block"; // Mostra os cards
        text.textContent = "Ver menos"; // Muda o texto
        arrow.classList.remove("down");
        arrow.classList.add("up"); // Muda a seta para cima
    } else {
        additionalCards.style.display = "none"; // Oculta os cards
        text.textContent = "Ver mais"; // Muda o texto
        arrow.classList.remove("up");
        arrow.classList.add("down"); // Muda a seta para baixo
    }
});


// BOTÃO DE VOLTAR AO TOPO

window.addEventListener("scroll", function () {
    let scroll = document.querySelector(".scrollTop");
    scroll.classList.toggle("active", window.scrollY > 450);
  });
  
  function backTop() {
    window.scrollTo({
      top: 1,
      behavior: "smooth",
    });
  }