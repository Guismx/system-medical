<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGC Clinic</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

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
      justify-content: space-between;
      align-items: center;
    }
    .menu-home a {
      display: flex;
      width: 100%;
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
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="assets/logo.png" style="width: 60px" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
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
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
           aria-expanded="false">
            Consultas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=listar=consulta">Listar</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>
    </div>
  </div>
</nav> 
<div class="container-fluidcolor-line"></div>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <?php 
                include('config.php'); //Arquivo de conexão com o banco

                switch (@$_REQUEST['page']) {
                    case 'cadastrar-medico':
                        include('cadastrar-medico.php');
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
                        include('cadastrar-paciente.php');
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
                        include('cadastrar-consulta.php');
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
                        include('home.php');
                }
            ?>
        </div>
    </div>
</div>
 <!-- Menu de navegação -->
  <div class="menu-home">
    <a onclick="showSection('pagina1')">Pacientes</a>
    <a onclick="showSection('pagina2')">Médicos</a>
    <a onclick="showSection('pagina3')">Consultas</a>
  </div>

  <!-- Seções de conteúdo -->
<div class="pages-home">
  <div id="pagina1" class="section active">
    PAGES-HOME INDEX.PHP
    </div>

    <div id="pagina2" class="section">
      <?php
       switch (@$_REQUEST['page']) {
        default:
            include('listar-medico.php');
          };
      ?>
    </div>

    <div id="pagina3" class="section">
      <h2>Página 3</h2>
      <p>Conteúdo da Página 3.</p>
    </div>
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
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>