<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGC Clinic</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
<style>
      .navbar-nav .nav-link.active {
        color: #00ffe0a6;
      }
      .navbar-nav .nav-link.active:hover{
        color:white;
      }
      .nav-link {
        color: #00ffe0a6;
      }
      .nav-link:hover {
        color: white;
      }
      .dropdown-item {
        color: #00ffe0a6;
      }
      .dropdown-menu.show{
        background: #18211e;
      }
      .form-control {
        background: rgb(235, 255, 255);
      }
      .btn {
        background: rgb(33 37 41);
        border-color: #00ffe0a6;
        color: #00ffe0a6;
      }
      .btn:hover {
        background: #00ffe0a6;
        border-color: rgb(255 255 255);
        color: rgb(33 37 41);
      }
      .section {
      display: none;
      padding: 20px;
      }

      .active {
        display: block;
      }
      .menu-home {
        display: flex;
        max-width: 1200px;
        flex-direction: center;
        margin: 0 auto;

      }
      .menu-home a {
        display: flex;
        width: 400px;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        height: 30px;
      }
      .menu-home a:hover {
        border-bottom: 2px solid #00ffe0a6;
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

</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
   <div class="container-nav">
      <a class="navbar-brand" href="index.php">
        <img src="assets/logo.png" style="width: 60px" alt="">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      </div>
      <div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            <a class="nav-link active" aria-current="page" href="#servicos">Serviços</a>               
            <a class="nav-link" href="#equipe" role="button" aria-expanded="false">Equipe</a>
            <a class="nav-link" href="#localizacao" role="button" aria-expanded="false">Localização</a>
            <a class="nav-link" href="#" role="button" aria-expanded="false">Sobre</a>
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
   </div>
</nav> 

<div class="container-fluidcolor-line"></div>

<div class="container">
  <div class="banner">
    <img src="assets/banner1.png" alt="Banner">
  </div>
</div>

<div class="container-servicos" id="servicos">
  <h3>Conheça Nossos Serviços</h3>
  <div class="container-fluidcolor-line"></div>
  <div class="servicos-carousel">
    <!-- Primeiro conjunto de 4 Cards -->
    <div class="servicos-index pagina">
      <div class="card-index">
        <img src="./assets/consulta-geral.png" alt="">
        <h5><b>Consulta Médica Geral</b></h5>
        <p>Avaliação clínica completa do paciente, abordando histórico médico, sintomas atuais e realização de exames físicos.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/exames-laboratoriais.png" alt="">
        <h5><b>Exames Laboratoriais</b></h5>
        <p>Conjunto de exames de sangue, urina, fezes e outros fluidos corporais para diagnóstico de doenças.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/consulta-especialiazada.png" alt="">
        <h5><b>Consultas Especializadas</b></h5>
        <p>Atendimento realizado por médicos especialistas, como cardiologistas, dermatologistas, endocrinologistas, entre outros.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/consulta-pediatra.png" alt="">
        <h5><b>Consulta Pediátrica</b></h5>
        <p>Atendimento médico especializado para crianças e adolescentes, com foco na avaliação do crescimento.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
    </div>

    <!-- Segundo conjunto de 4 Cards -->
    <div class="servicos-index pagina">
      <div class="card-index">
        <img src="./assets/consulta-odontologica.png" alt="">
        <h5><b>Consulta Odontológica</b></h5>
        <p>Consultas de rotina com foco em prevenção e tratamento de problemas dentários, como cáries e doenças gengivais.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/fisioterapia.png" alt="">
        <h5><b>Fisioterapia</b></h5>
        <p>Tratamento fisioterápico para recuperação de movimentos, reabilitação muscular e redução de dores articulares.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/consulta-psiquiatra.png" alt="">
        <h5><b>Consulta Psiquiátrica</b></h5>
        <p>Avaliação e tratamento para transtornos mentais, distúrbios emocionais e doenças psicológicas.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/consulta-nutricional.png" alt="">
        <h5><b>Consulta Nutricional</b></h5>
        <p>Orientação sobre hábitos alimentares, controle de peso e dieta específica para condições de saúde.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
    </div>
  </div>

  <!-- Navegação do Carrossel -->
  <div class="carousel-controls">
    <button class="prev">←</button>
    <button class="next">→</button>
  </div>
</div>

<div class="container-equipe" id="equipe"> 
  <div class="banner-equipe">
    <div class="dado-equipe">
      <img src="./assets/medico-1.png" alt="">
      <h6>Dra. Anna Luiza</h6>
      <p>Cardiologista</p>
      <p><b>CRM:</b> XXX.XXX.XXX</p>
    </div>
    
    <div class="infor-equipe">
      <p>
        Dra. Anna é cardiologista clínica e intervencionista, formada pela Universidade de São Paulo (USP) e com especialização em cardiologia intervencionista pelo Instituto Dante Pazzanese de Cardiologia. Com vasta experiência em instituições renomadas como o Hospital do Coração (HCor) e o Hospital Albert Einstein, Dra. Anna é especializada em procedimentos como cateterismo cardíaco e angioplastia, além de realizar atendimentos clínicos para pacientes com doenças cardiovasculares. Ao longo de sua carreira, ela também atuou na prevenção e educação em saúde cardíaca, completando capacitações em arritmias e suporte avançado de vida em cardiologia.</p>
    </div>
  </div>

  <div class="banner-equipe2">
  <div class="infor-equipe2">
      <p>Dra. Anna é cardiologista clínica e intervencionista, formada pela Universidade de São Paulo (USP) e com especialização em cardiologia intervencionista pelo Instituto Dante Pazzanese de Cardiologia. Com vasta experiência em instituições renomadas como o Hospital do Coração (HCor) e o Hospital Albert Einstein, Dra. Anna é especializada em procedimentos como cateterismo cardíaco e angioplastia, além de realizar atendimentos clínicos para pacientes com doenças cardiovasculares. Ao longo de sua carreira, ela também atuou na prevenção e educação em saúde cardíaca, completando capacitações em arritmias e suporte avançado de vida em cardiologia.</p>
    </div>
    <div class="dado-equipe2">
      <img src="./assets/medico-1.png" alt="">
      <h6>Dra. Anna Luiza</h6>
      <p>Cardiologista</p>
      <p><b>CRM: </b>XXX.XXX.XXX</p>
    </div>
  </div>

  <div class="banner-equipe">
    <div class="dado-equipe">
      <img src="./assets/medico-1.png" alt="">
      <h6>Dra. Anna Luiza</h6>
      <p>Cardiologista</p>
      <p><b>CRM: </b>XXX.XXX.XXX</p>
    </div>
    <div class="infor-equipe">
      <p>Dra. Anna é cardiologista clínica e intervencionista, formada pela Universidade de São Paulo (USP) e com especialização em cardiologia intervencionista pelo Instituto Dante Pazzanese de Cardiologia. Com vasta experiência em instituições renomadas como o Hospital do Coração (HCor) e o Hospital Albert Einstein, Dra. Anna é especializada em procedimentos como cateterismo cardíaco e angioplastia, além de realizar atendimentos clínicos para pacientes com doenças cardiovasculares. Ao longo de sua carreira, ela também atuou na prevenção e educação em saúde cardíaca, completando capacitações em arritmias e suporte avançado de vida em cardiologia.</p>
    </div>
  </div>
</div>


<div class="container-localizacao" id="localizacao">
      <div class="localizacao-mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d347290.35293727944!2d8.324882787586263!3d47.153822030601965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900a0862cee21b%3A0xcbd18db34aeffa82!2sHealth%20%26%20Medical%20Service%20AG!5e0!3m2!1sen!2sbr!4v1731094945395!5m2!1sen!2sbr" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="informacoes-localizacao">
        <h5><b>Endereço: </b></h5>
        <p>Rua da Saúde, 123, Bairro Central, São Lucas - SP, CEP 12345-678</p>
        <h5><b>Contato: </b></h5>
        <p>(11) 98755-4321</p>
        <h5><b>Horário de Funcionamento: </b></h5>
        <p>Segunda a Sexta, das 7h às 18h; Sábado, das 8h às 13h</p>
        <div class="img-loja">
          <img src="https://casaeconstrucao.org/wp-content/uploads/2024/02/Fonte-Pinterest-4-31.jpg" alt="">
        </div>
      </div>
</div>










  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
  <script src="javascript.js"></script>
</body>
</html>