<h1>Cadastrar Médico</h1>
<?php
// Verifica se o id_usuario foi passado na URL
    if (isset($_GET['id_usuario'])) {
    // Recupera o id_usuario da URL
    $id_usuario = $_GET['id_usuario'];

    // Faz a consulta para obter os dados do usuário com o id_usuario
    $sql = "SELECT * FROM `usuario` WHERE id_usuario = $id_usuario";
    $res = $conn->query($sql);

    // Verifica se o usuário foi encontrado
    if ($res->num_rows > 0) {
        // Se o usuário foi encontrado, carrega os dados na variável $user
        $user = $res->fetch_assoc();
    } else {
        // Caso não encontre o usuário, redireciona ou exibe uma mensagem de erro
        echo "Usuário não encontrado!";
        exit; // Saia da execução se o usuário não for encontrado
    }
}
?>

<!-- Exibir a lista de usuários acima do formulário -->
<?php
// Consulta para pegar todos os usuários cadastrados
$sql = "SELECT * FROM `usuario`";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>CPF</th>";
    echo "<th>E-mail</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>Sexo</th>";
    echo "<th>Endereço</th>";
    echo "<th>Nível de Acesso</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $row->id_usuario . "</td>";
        echo "<td>" . $row->nome_usuario . "</td>";
        echo "<td>" . $row->cpf_usuario . "</td>";
        echo "<td>" . $row->email_usuario . "</td>";
        echo "<td>" . $row->data_nasc_usuario . "</td>";
        echo "<td>" . $row->sexo_usuario . "</td>";
        echo "<td>" . $row->endereco_usuario . "</td>";
        echo "<td>" . $row->nivel_acesso . "</td>";
        echo "<td>
                <button class='btn btn-success' onclick=\"location.href='?page=cadastrar-medico&id_usuario={$row->id_usuario}';\">Selecionar</button>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Não encontrou resultados";
}
?>

<!-- Formulário de Cadastro de Médico -->
<form action="?page=salvar-medico" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <!-- Campo oculto para passar o ID do usuário selecionado -->
    <input type="hidden" name="id_usuario" value="<?php echo isset($user['id_usuario']) ? $user['id_usuario'] : ''; ?>">

    <!-- Nome do Médico -->
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_medico" class="form-control" value="<?php echo isset($user['nome_usuario']) ? $user['nome_usuario'] : ''; ?>" <?php echo isset($user['nome_usuario']) ? 'readonly' : ''; ?>>
    </div>

    <!-- Nível de Acesso -->
    <div class="mb-3">
        <label>Nível de Acesso</label>
        <select name="nivel_acesso" class="form-control">
            <option value="paciente" <?php echo (isset($user['nivel_acesso']) && $user['nivel_acesso'] == 'paciente') ? 'selected' : ''; ?>>Paciente</option>
            <option value="medico" <?php echo (isset($user['nivel_acesso']) && $user['nivel_acesso'] == 'medico') ? 'selected' : ''; ?>>Médico</option>
            <option value="admin" <?php echo (isset($user['nivel_acesso']) && $user['nivel_acesso'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
        </select>
    </div>

    <!-- CPF do Médico -->
    <div class="mb-3">
        <label>CPF</label>
        <input type="text" name="cpf_medico" class="form-control" value="<?php echo isset($user['cpf_usuario']) ? $user['cpf_usuario'] : ''; ?>" <?php echo isset($user['cpf_usuario']) ? 'readonly' : ''; ?>>
    </div>

    <!-- E-mail do Médico -->
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email_medico" class="form-control" value="<?php echo isset($user['email_usuario']) ? $user['email_usuario'] : ''; ?>" <?php echo isset($user['email_usuario']) ? 'readonly' : ''; ?>>
    </div>

    <!-- Data de Nascimento do Médico -->
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="data_nasc_medico" class="form-control" value="<?php echo isset($user['data_nasc_usuario']) ? $user['data_nasc_usuario'] : ''; ?>" <?php echo isset($user['data_nasc_usuario']) ? 'readonly' : ''; ?>>
    </div>

    <!-- Sexo do Médico -->
    <div class="mb-3">
        <label>Sexo</label>
        <input type="text" name="sexo_medico" class="form-control" value="<?php echo isset($user['sexo_usuario']) ? $user['sexo_usuario'] : ''; ?>" <?php echo isset($user['sexo_usuario']) ? 'readonly' : ''; ?>>
    </div>

    <!-- Endereço do Médico -->
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco_medico" class="form-control" value="<?php echo isset($user['endereco_usuario']) ? $user['endereco_usuario'] : ''; ?>" <?php echo isset($user['endereco_usuario']) ? 'readonly' : ''; ?>>
    </div>

    <!-- CRM do Médico -->
    <div class="mb-3">
        <label>CRM</label>
        <input type="text" name="crm_medico" class="form-control">
    </div>

    <!-- Especialidade do Médico -->
    <div class="mb-3">
        <label>Especialidade</label>
        <input type="text" name="especialidade_medico" class="form-control">
    </div>

    <!-- Botão para enviar o formulário -->
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Cadastrar Médico</button>
    </div>
</form>
