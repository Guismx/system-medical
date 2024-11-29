<?php
session_start();
include('./config-db/config.php');

// Verifica se o usuário está logado
if (isset($_SESSION['usuario'])) {
    // Se o usuário estiver logado, recupera o nome do usuário usando o id_usuario
    $idUsuario = $_SESSION['usuario'];

    // Consulta para pegar o nome do usuário
    $sql = "SELECT nome_usuario FROM usuario WHERE id_usuario = '$idUsuario'";
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        $dado = $res->fetch_assoc();
        $nomeUsuario = $dado['nome_usuario'];
    } else {
        $nomeUsuario = 'Usuário não encontrado';
    }
} else {
    $nomeUsuario = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGC Clinic</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">    
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
</style>
</head>

<body>
<button class="scrollTop" onclick="backTop();">
  <img src="./assets/images/logos/logo-seta.png" alt="" />
</button>
<nav class="navbar navbar-expand-lg bg-dark">
   <div class="container-nav">
      <a class="navbar-brand" href="index.php">
        <img src="./assets/images/logos/logo.png" style="width: 60px" alt="">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      </div>
      <div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            <a class="nav-link active" aria-current="page" href="#servicos">Serviços</a>
            <a class="nav-link" href="#equipe" role="button" aria-expanded="false">Equipe</a>
            <a class="nav-link" href="#localizacao" role="button" aria-expanded="false">Localização</a>
            <a class="nav-link" href="#sobre" role="button" aria-expanded="false">Sobre</a>

            <!-- Verifica se o usuário está logado -->
            <?php if ($nomeUsuario): ?>
                <!-- Dropdown para o usuário logado -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo htmlspecialchars($nomeUsuario); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Adiciona o link de "Minhas Consultas" e "Meus Dados" -->
                        <li><a class="dropdown-item" href="minhas-consultas.php">Minhas Consultas</a></li>
                        <li><a class="dropdown-item" href="meus-dados.php">Meus Dados</a></li>

                        <!-- Verifica o nível de acesso do usuário -->
                        <?php if ($_SESSION['nivel_acesso'] != 'paciente'): ?>
                            <!-- Exibe o link "Painel Administrativo" para usuários não-pacientes -->
                            <li><a class="dropdown-item" href="admin/paineladm.php">Painel Administrativo</a></li>
                        <?php endif; ?>
                        <!-- Link de logout -->
                        <li><a class="dropdown-item" href="./auth/logout.php">Sair</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- Exibe os links de "Entrar" e "Cadastrar" caso o usuário não esteja logado -->
                <a class="nav-link" href="./auth/login.php">Entrar / Cadastrar</a>
            <?php endif; ?>
        </ul>
      </div>
   </div>
</nav>
<div class="container-fluidcolor-line"></div>
<div class="container-banner">
    <img src="assets/images/banners/banner1.png" alt="Banner">
</div>

<div class="container-servicos" id="servicos">
  <div class="into-servicos">
      <div>
        <h3>Conheça Nossos Serviços</h3>
        <div class="container-fluidcolor-line"></div> 
      </div>
      <div class="servicos-carousel">
     <!--COMENTÁRIO Primeiro conjunto de 4 Cards -->
    <div class="servicos-index pagina">
      <div class="card-index">
        <img src="./assets/images/outros/consulta-geral.png" alt="">
        <h5><b>Consulta Médica Geral</b></h5>
        <p>Avaliação clínica completa do paciente, abordando histórico médico, sintomas atuais e realização de exames físicos.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/images/outros/exames-laboratoriais.png" alt="">
        <h5><b>Exames Laboratoriais</b></h5>
        <p>Conjunto de exames de sangue, urina, fezes e outros fluidos corporais para diagnóstico de doenças.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/images/outros/consulta-especialiazada.png" alt="">
        <h5><b>Consultas Especializadas</b></h5>
        <p>Atendimento realizado por médicos especialistas, como cardiologistas, dermatologistas, endocrinologistas, entre outros.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/images/outros/consulta-pediatra.png" alt="">
        <h5><b>Consulta Pediátrica</b></h5>
        <p>Atendimento médico especializado para crianças e adolescentes, com foco na avaliação do crescimento.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
    </div>

    <!--COMENTÁRIO Segundo conjunto de 4 Cards --> 
    <div class="servicos-index pagina">
      <div class="card-index">
        <img src="./assets/images/outros/consulta-odontologica.png" alt="">
        <h5><b>Consulta Odontológica</b></h5>
        <p>Consultas de rotina com foco em prevenção e tratamento de problemas dentários, como cáries e doenças gengivais.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/images/outros/fisioterapia.png" alt="">
        <h5><b>Fisioterapia</b></h5>
        <p>Tratamento fisioterápico para recuperação de movimentos, reabilitação muscular e redução de dores articulares.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/images/outros/consulta-psiquiatra.png" alt="">
        <h5><b>Consulta Psiquiátrica</b></h5>
        <p>Avaliação e tratamento para transtornos mentais, distúrbios emocionais e doenças psicológicas.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
      <div class="card-index">
        <img src="./assets/images/outros/consulta-nutricional.png" alt="">
        <h5><b>Consulta Nutricional</b></h5>
        <p>Orientação sobre hábitos alimentares, controle de peso e dieta específica para condições de saúde.</p>
        <a href="#" class="ver-mais">Ver mais</a>
      </div>
    </div>

  </div>
    <!--#COMENTÁRIO Navegação do Carrossel -->
    <div class="carousel-controls">
      <button class="prev button-next">
        <span class="button-next-box">
          <span class="button-next-elem"></span>
        </span>
      </button>
      <button class="next button-next">
        <span class="button-next-box">
          <span class="button-next-elem"></span>
        </span>
      </button>     
    </div>

  </div>
</div>


<div class="container-equipe" id="equipe">
  <div class="into-equipe">
    <div>
      <h3>Nossa Equipe</h3>
      <div class="container-fluidcolor-line"></div>
    </div>
    
    <!-- Primeiro card visível -->
    <div class="banner-equipe">
      <div class="dado-equipe">
        <img src="./assets/images/outros/medico-1.png" alt="">
        <h6>Dra. Anna Luiza</h6>
        <p>Cardiologista</p>
        <p><b>CRM:</b> XXX.XXX.XXX</p>
      </div>
      <div class="infor-equipe">
        <p> Dra. Anna é cardiologista clínica e intervencionista, formada pela Universidade de São Paulo (USP) e com especialização em cardiologia intervencionista pelo Instituto Dante Pazzanese de Cardiologia. Com vasta experiência em instituições renomadas como o Hospital do Coração (HCor) e o Hospital Albert Einstein, Dra. Anna é especializada em procedimentos como cateterismo cardíaco e angioplastia, além de realizar atendimentos clínicos para pacientes com doenças cardiovasculares. Ao longo de sua carreira, ela também atuou na prevenção e educação em saúde cardíaca, completando capacitações em arritmias e suporte avançado de vida em cardiologia.</p>
        </p>
      </div>
    </div>
    
    <!-- Cards adicionais inicialmente ocultos -->
    <div class="additional-cards" style="display: none;">
      <div class="banner-equipe2">
        <div class="infor-equipe2">
          <p> Dra. Anna é cardiologista clínica e intervencionista, formada pela Universidade de São Paulo (USP) e com especialização em cardiologia intervencionista pelo Instituto Dante Pazzanese de Cardiologia. Com vasta experiência em instituições renomadas como o Hospital do Coração (HCor) e o Hospital Albert Einstein, Dra. Anna é especializada em procedimentos como cateterismo cardíaco e angioplastia, além de realizar atendimentos clínicos para pacientes com doenças cardiovasculares. Ao longo de sua carreira, ela também atuou na prevenção e educação em saúde cardíaca, completando capacitações em arritmias e suporte avançado de vida em cardiologia.</p>
          </p>
        </div>
        <div class="dado-equipe2">
          <img src="./assets/images/outros/medico-1.png" alt="">
          <h6>Dra. Anna Luiza</h6>
          <p>Cardiologista</p>
          <p><b>CRM: </b>XXX.XXX.XXX</p>
        </div>
      </div>
      
      <div class="banner-equipe">
        <div class="dado-equipe">
          <img src="./assets/images/outros/medico-1.png" alt="">
          <h6>Dra. Anna Luiza</h6>
          <p>Cardiologista</p>
          <p><b>CRM: </b>XXX.XXX.XXX</p>
        </div>
        <div class="infor-equipe">
          <p> Dra. Anna é cardiologista clínica e intervencionista, formada pela Universidade de São Paulo (USP) e com especialização em cardiologia intervencionista pelo Instituto Dante Pazzanese de Cardiologia. Com vasta experiência em instituições renomadas como o Hospital do Coração (HCor) e o Hospital Albert Einstein, Dra. Anna é especializada em procedimentos como cateterismo cardíaco e angioplastia, além de realizar atendimentos clínicos para pacientes com doenças cardiovasculares. Ao longo de sua carreira, ela também atuou na prevenção e educação em saúde cardíaca, completando capacitações em arritmias e suporte avançado de vida em cardiologia.</p>
          </p>
        </div>
      </div>
    </div>

    <!-- Botão para expandir -->
    <button class="toggle-btn" id="toggle-cards">
      <span class="toggle-text">Ver mais</span>
      <span class="toggle-arrow down">></span>
    </button>
  </div>
</div>


<div class="container-localizacao" id="localizacao">
  <div>
    <h3>Localização</h3>
    <div class="container-fluidcolor-line"></div> 
  </div>
  <div class="container-into-localizacao">
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
</div>

<div class="container-sobre" id="sobre">
  <div class="container-into">
  <div>
    <h3>Sobre nós</h3>
    <div class="container-fluidcolor-line"></div>
  </div>
  <div class="sobre-principal">
    <p>A <b style="color: #00ffe0a6">MGC Clinic</b> foi fundada com o propósito de oferecer um atendimento médico de excelência, pautado no compromisso com a saúde e bem-estar dos nossos pacientes. Ao longo dos anos, crescemos e nos consolidamos como uma clínica de referência na região, sempre investindo em inovação e em uma equipe de profissionais altamente qualificados. Desde a nossa inauguração, buscamos integrar tecnologia de ponta e um atendimento humanizado, com a missão de proporcionar cuidado médico integral em todas as fases da vida. Através de uma gestão eficiente e uma visão voltada para a qualidade, a <b style="color: #00ffe0a6">MGC Clinic</b> se tornou um espaço confiável e acolhedor, onde nossos pacientes encontram não apenas tratamentos especializados, mas também um atendimento dedicado e personalizado. Nossa trajetória é marcada pela busca constante por melhorias, pela construção de uma rede de confiança com nossos pacientes e pela promoção da saúde com ética, respeito e competência.</p>
    <img src="./assets/images/outros/equipe-medicos.png.png" alt="">
  </div>
  <div class="cards-sobre">
    <div class="card-sobre">
      <img class="img-icon" src="./assets/images/icons/icon-compromisso.png" alt="">
      <h4>Compromisso com a Saúde</h4>
      <p>Priorizamos a prevenção, o diagnóstico precoce e o acompanhamento contínuo de nossos pacientes. Acreditamos que a saúde é um processo dinâmico, que exige atenção constante e cuidados em todas as fases da vida.</p>
    </div>
    <div class="card-sobre">
      <img class="img-icon" src="./assets/images/icons/icon-visao.png" alt="">
      <h4>Nossa Visão</h4>
      <p>Ser reconhecida como uma clínica de referência em excelência médica e atendimento humanizado, proporcionando aos nossos pacientes um ambiente seguro, acolhedor e de confiança.</p>
    </div>
  </div>
  <div class="cards-sobre">
    <div class="card-sobre">
      <img class="img-icon" src="./assets/images/icons/icon-missao.png" alt="">
      <h4>Nossa Missão</h4>
      <p>Oferecer cuidados médicos completos, com base em um atendimento técnico de alta qualidade e com um olhar atento às necessidades individuais de cada paciente. Trabalhamos para promover a saúde e qualidade de vida, com uma equipe comprometida em oferecer sempre o melhor.</p>
    </div>
    <div class="card-sobre">
      <img class="img-icon" src="./assets/images/icons/icon-valores.png" alt="">
      <h4>Valores</h4>
      <p>Compromisso com o paciente: Cuidamos de cada paciente com empatia, respeito e atenção.
      Excelência médica: Oferecemos tratamentos e diagnósticos com precisão, atualizados com as melhores práticas da medicina.
      Inovação: Estamos sempre à frente, incorporando novas tecnologias e técnicas para garantir o melhor cuidado.
      Atenção personalizada: Cada pessoa é única, por isso, oferecemos um atendimento que respeita as especificidades de cada paciente.</p>
    </div>
  </div>
  </div>
</div>

<footer>
  <div class="rodape">
      <div class="into-rodape">
        <div class="info-page-rodape">
          <ul>
            <li><b>NAVEGAÇÃO</b></li><br>
            <li><a href="">Inicio</a></li>
            <li><a href="#servicos">Serviços</a></li>
            <li><a href="#equipe">Equipe</a></li>
            <li><a href="#localizacao">Localização</a></li>
            <li><a href="#sobre">Sobre</a></li>
          </ul>
        </div>
        <div class="info-clinica-rodape">
          <ul>
            <li><b>INFORMAÇÕES</b></li><br>
            <li>Política de Privacidade</li>
            <li>Política de cookies</li>
          </ul>
        </div>
        <div class="info-atendimentos-rodape">
          <ul>
              <li><b>ATENDIMENTOS</b></li><br>
              <li>61 XXXX-XXXX</li>
              <li>61 XXXX-XXXX</li>
              <li>mgc@gmail.com</li>
          </ul>
        </div>
      </div>
      <div class="receber-novidades-rodape">
        <h3>RECEBER NOVIDADES</h3>
          <form>
            <label for="email"><b>Digite seu e-mail</b></label>
            <input type="email" name="email" id="email"/>
            <button>Enviar</button>
          </form>
      </div>
  </div>
</footer>
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/javascript.js"></script>
</body>
</html>