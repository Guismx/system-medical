<?php
    include('config.php'); // Verifique se o arquivo config.php está configurado corretamente

    session_start(); // Inicia a sessão, se não estiver iniciada

    // Verifica se o formulário foi enviado
    if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
        $_SESSION['email'] = $conn->escape_string($_POST['email']);
        $_SESSION['senha'] = md5($_POST['senha']); // Aplica md5() apenas uma vez na senha

        // Consulta para verificar o e-mail e a senha no banco
        $sql = "SELECT senha, id_usuario FROM usuario WHERE email_usuario = '" . $_SESSION['email'] . "'";
        $res = $conn->query($sql) or die($conn->error); // Certifique-se de usar a variável de conexão correta
        $dado = $res->fetch_assoc();
        $total = $res->num_rows;

        // Verifica se o usuário existe e a senha está correta
        if ($total == 0) {
            $erro[] = "Este email não pertence a um usuário.";
        } else {
            if ($dado['senha'] == $_SESSION['senha']) {
                $_SESSION['usuario'] = $dado['id_usuario'];
            } else {
                $erro[] = "Senha incorreta.";
            }
        }

        // Se não houver erros, redireciona o usuário para a página de listagem de pacientes
        if (empty($erro)) {
            echo "<script>alert('Login efetuado com sucesso'); location.href='indexadm.php';</script>";
        }
    }

    // Verifica qual página deve ser carregada
    switch (@$_REQUEST['page']) {
        case 'cadastrar':
            include('cadastro-usuario.php');
            break;
    }
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container-login">
        <div class="card">
            <div class="card2">
                <!-- Formulário de login -->
                <form method="POST" action="">
                    <p id="heading">Login</p>
                    <div class="field">
                        <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="input-icon">
                            <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"></path>
                        </svg>
                        <p><input class="input-field" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" name="email" placeholder="E-mail" type="text"></p>
                    </div>
                    <div class="field">
                        <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="input-icon">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"></path>
                        </svg>
                        <p><input class="input-field" name="senha" type="password" placeholder="Senha"></p>
                    </div>
                    <div class="btn-login">
                        <input class="entrar" value="Entrar" type="submit">
                        <input class="cadastrar" value="Cadastrar" type="button" onclick="window.location.href='cadastro-usuario.php';">

                    </div>
                    <input class="esqueceu-senha" value="Esqueceu sua senha?" type="submit">
                </form>

                <!-- Aqui estão as mensagens de erro, agora abaixo do botão "Esqueceu sua senha?" -->
                <?php
                // Exibe os erros, se houver
                if (isset($erro) && count($erro) > 0) {
                    echo '<div class="error-messages">';
                    foreach ($erro as $msg) {
                        echo "<p>$msg</p>";
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

