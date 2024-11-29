<?php
include('../auth/protect.php');
protect();
include('../config-db/config.php');

// Função para recuperar o nome do usuário
function getNomeUsuario($conn, $idUsuario) {
    $sql = "SELECT nome_usuario FROM usuario WHERE id_usuario = '$idUsuario'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $dado = $res->fetch_assoc();
        return $dado['nome_usuario'];
    } else {
        return 'Usuário não encontrado';
    }
}

$nomeUsuario = null;
if (isset($_SESSION['usuario'])) {
    $idUsuario = $_SESSION['usuario'];
    $nomeUsuario = getNomeUsuario($conn, $idUsuario);

    // Verificar o nível de acesso do usuário
    if (isset($_SESSION['nivel_acesso']) && $_SESSION['nivel_acesso'] == 'paciente') {
        // Redirecionar para a página de login.php caso o nível de acesso seja 'paciente'
        header("Location: login.php");
        exit(); // Interrompe a execução do script
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGC Clinic</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
      body {
        background:linear-gradient(to right, #0c0c0c, rgb(29, 29, 29), rgb(29, 29, 29), #0c0c0c);
        color: white;
      }
      .container-fluidcolor-line {
        background: linear-gradient(to right, #d6daff, #00ffe0a6, #00ffe0a6, #d6daff);
        height: 3px;
        width: 100%;
      }
      .container-nav {
        display: flex;
        justify-content: center; 
        align-items: center; 
        max-width: 1200px;
        width: 100%;
        margin: 0 auto; 
        padding: 0; 
        gap: 2rem; /* Espaçamento entre os itens */
        padding-right: 5px; /* Padding específico à direita */
      }
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
      .dropdown-menu.show {
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
<nav class="navbar navbar-expand-lg bg-dark">
   <div class="container-nav">
      <a class="navbar-brand" href="indexadm.php">
        <img src="../assets/images/logos/logo.png" style="width: 60px" alt="">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo (!isset($_REQUEST['page']) || $_REQUEST['page'] == 'home') ? 'active' : ''; ?>" href="paineladm.php?page=home">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Médicos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-medico">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pacientes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-paciente">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Consultas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-consulta">Listar</a></li>
            </ul>
            <li class="nav-item">
            <a class="nav-link <?php echo (!isset($_REQUEST['page']) || $_REQUEST['page'] == 'home') ? 'active' : ''; ?>" href="index.php?page=home">Voltar a página inicial</a>
          </li>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-consulta">Listar</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div>
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
                        <!-- Link de logout -->
                        <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                    </ul>
                </div>
            <?php else: ?>
              
            <?php endif; ?>
      </div>
   </div>
</nav> 
<div class="container-fluidcolor-line"></div>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <?php 
                // Switch para carregar a página correspondente de acordo com o parâmetro 'page'
                switch (@$_REQUEST['page']) {
                    case 'cadastrar-medico':
                        include('backend/register/cadastrar-medico.php');
                        break;
                    case 'editar-medico':
                        include('editar-medico.php');
                        break;
                    case 'listar-medico':
                        include('listar-medico.php');
                        break;
                    case 'salvar-medico':
                        include('salvar-medico.php');    
                        break;  
                        
                    case 'cadastrar-paciente':
                        include('backend/register/cadastrar-paciente.php');
                        break;
                    case 'editar-paciente':
                        include('editar-paciente.php');
                        break;
                    case 'listar-paciente':
                        include('listar-paciente.php');
                        break;
                    case 'salvar-paciente':
                        include('salvar-paciente.php');    
                        break;  
                            

                    case 'cadastrar-consulta':
                        include('backend/register/cadastrar-consulta.php');
                        break;
                    case 'editar-consulta':
                        include('editar-consulta.php');
                        break;
                    case 'listar-consulta':
                        include('listar-consulta.php');
                        break;
                    case 'salvar-consulta':
                        include('salvar-consulta.php');    
                        break;  
                    
                    default:
                        include('../views/home.php'); // Página inicial
                }
            ?>
        </div>
    </div>
</div>

<?php
// Verifique se a página atual é 'home.php' (ou se o parâmetro 'page' está vazio ou definido como 'home')
if (!isset($_REQUEST['page']) || $_REQUEST['page'] == 'home') {
?>
  <!-- Menu de navegação -->
  <div class="menu-home">
    <a onclick="showSection('pagina1')">Pacientes</a>
    <a onclick="showSection('pagina2')">Médicos</a>
    <a onclick="showSection('pagina3')">Consultas</a>
  </div>

  <!-- Seções de conteúdo -->
  <div class="pages-home">
    <div id="pagina1" class="section active">
    <?php
        // Aqui você pode incluir a listagem de médicos
        switch (@$_REQUEST['page']) {
          default:
            include('../views/list/listar-paciente.php');
        }
      ?>
    </div>

    <div id="pagina2" class="section">
      <?php
        // Aqui você pode incluir a listagem de médicos
        switch (@$_REQUEST['page']) {
          default:
            include('../views/list/listar-medico.php');
        }
      ?>
    </div>

    <div id="pagina3" class="section">
    <?php
        // Aqui você pode incluir a listagem de médicos
        switch (@$_REQUEST['page']) {
          default:
            include('../views/list/listar-consulta.php');
        }
      ?>
  </div>

  <!-- JavaScript para alternar seções -->
  <script>
    function showSection(sectionId) {
      // Esconde todas as seções
      const sections = document.querySelectorAll('.section');
      sections.forEach(section => section.classList.remove('active'));

      // Mostra a seção selecionada
      document.getElementById(sectionId).classList.add('active');
    };
  </script>
<?php
}
?>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
