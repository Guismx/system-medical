<style>
  /* Garantir que a página tenha o estilo padrão sem alterações globais */
  body, html {
    margin: 0;
    padding: 0;
    height: 100%; /* Mantém o corpo ocupando 100% da altura */
  }

  /* Estilo do container do banner */
  .banner {
    width: 100%; /* O banner ocupa toda a largura da página */
    height: 400px; /* Defina a altura do banner conforme necessário */
    display: flex; /* Usa Flexbox para centralizar o conteúdo dentro do banner */
    justify-content: center; /* Centraliza horizontalmente */
    align-items: center; /* Centraliza verticalmente */
    overflow: hidden; /* Garante que qualquer parte da imagem que ultrapasse seja oculta */
  }

  /* Estilo da imagem dentro do banner */
  .banner img {
    max-width: 1200px;
    width: 1200px;  /* A imagem vai cobrir toda a largura do banner */
    height: 100%; /* A imagem vai cobrir toda a altura do banner */
    object-fit: cover; /* Faz com que a imagem cubra a área sem distorcer */
  }
</style>

<div class="container">
  <div class="banner">
    <img src="../assets/images/banners/banner1.png" alt="Banner">
  </div>
</div>
