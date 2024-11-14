<?php
    include('config.php'); // Verifique se o arquivo config.php está configurado corretamente

    session_start(); // Inicia a sessão, se não estiver iniciada

    // Verifica se o formulário foi enviado
    if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
        // Escapa o e-mail para prevenir SQL Injection
        $email = $conn->escape_string($_POST['email']);
        $senha = md5($_POST['senha']); // Aplica md5() apenas uma vez na senha

        // Verifica se o e-mail já está registrado no banco de dados
        $sql_check_email = "SELECT id_usuario FROM usuario WHERE email_usuario = '$email'";
        $res_check_email = $conn->query($sql_check_email) or die($conn->error); // Executa a consulta para verificar o e-mail
        $total_email = $res_check_email->num_rows; // Número de registros com o e-mail informado

        if ($total_email > 0) {
            // Se o e-mail já existe, adiciona um erro
            $erro[] = "Este e-mail já está cadastrado. Tente outro.";
        } else {
            // Caso o e-mail não exista, tenta inserir o novo usuário
            // Dados de cadastro
            $nome_usuario = $conn->escape_string($_POST['nome_usuario']);
            $cpf_usuario = $conn->escape_string($_POST['cpf-usuario']);
            $data_nasc_usuario = $conn->escape_string($_POST['data-nasc-usuario']);
            $sexo_paciente = $conn->escape_string($_POST['sexo_paciente']);
            $endereco_usuario = $conn->escape_string($_POST['data-nasc-usuario']); // Verifique o campo de endereço

            // Insere o novo usuário no banco de dados
            $sql_insert = "INSERT INTO usuario (nome_usuario, email_usuario, senha, cpf_usuario, data_nasc_usuario, sexo_paciente, endereco_usuario) 
                           VALUES ('$nome_usuario', '$email', '$senha', '$cpf_usuario', '$data_nasc_usuario', '$sexo_paciente', '$endereco_usuario')";
            if ($conn->query($sql_insert)) {
                // Se a inserção for bem-sucedida, redireciona
                echo "<script>alert('Cadastro realizado com sucesso'); location.href='login.php';</script>";
            } else {
                $erro[] = "Erro ao cadastrar usuário. Tente novamente.";
            }
        }
    }
?>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container-login">
        <div class="card">
            <div class="card2">
                <!-- Formulário de cadastro -->
				<form action="" method="POST">
                    <p id="heading">Cadastro</p>
					<div class="field">
                        <p><input class="input-field" name="nome_usuario" type="text" placeholder="Nome e Sobrenome" required></p>
                    </div>
                    <div class="field">
                        <p><input class="input-field" name="cpf-usuario" type="text" placeholder="CPF" required></p>
                    </div>
					<div class="field">
                        <p><input class="input-field" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" name="email" placeholder="E-mail" type="email" required></p>
                    </div>
					<div class="field">
                        <p><input class="input-field" name="senha" type="password" placeholder="Senha" required></p>
                    </div>
					<div class="field">
                        <p><input class="input-field" name="data-nasc-usuario" type="date" placeholder="Data de Nascimento" required></p>
                    </div>
					<div class="field">
                        <p><input class="input-field" name="endereco-usuario" type="text" placeholder="Endereço" required></p>
                    </div>
					<p class="sexo">Sexo</p>
					<div class="field-sexo">
						<div class="opcao-sexo">
							<input type="radio" id="masculino" name="sexo_paciente" value="masculino" class="form-check-input" required>
							<label for="masculino" class="form-check-label">Masculino</label>
						</div>
						<div class="opcao-sexo">
							<input type="radio" id="feminino" name="sexo_paciente" value="feminino" class="form-check-input" required>
							<label for="feminino" class="form-check-label">Feminino</label>
						</div>
					</div>
                    <div class="btn-login">
                        <input class="entrar" value="Cadastrar" type="submit">
                        <input class="cadastrar" value="Voltar" type="button" onclick="window.location.href='login.php';">
                    </div>
                </form>

                <!-- Exibe os erros de cadastro -->
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
