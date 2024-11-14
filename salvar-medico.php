<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Coleta os dados do formulário
        $id_usuario = $_POST['id_usuario'];  // ID do usuário selecionado
        $crm = $_POST['crm_medico'];
        $especialidade = $_POST['especialidade_medico'];

        // Realiza a inserção na tabela "medico"
        $sql = "INSERT INTO medico (crm_medico, especialidade_medico, usuario_id_usuario)
                VALUES ('{$crm}', '{$especialidade}', {$id_usuario})";

        $res = $conn->query($sql);

        // Verifica se a inserção foi bem-sucedida
        if ($res == true) {
            // Após cadastrar o médico, atualize o nível de acesso do usuário para "medico"
            $sql_update_nivel = "UPDATE usuario SET nivel_acesso = 'medico' WHERE id_usuario = {$id_usuario}";
            $conn->query($sql_update_nivel);

            print "<script>alert('Médico cadastrado com sucesso!')</script>";
            print "<script>location.href='?page=listar-medico'</script>";
        } else {
            print "<script>alert('Erro ao cadastrar médico!')</script>";
            print "<script>location.href='?page=listar-medico'</script>";
        }
        break;

    case 'editar':
        // Coleta os dados do formulário para edição
        $id_medico = $_POST['id_medico'];
        $crm = $_POST['crm_medico'];
        $especialidade = $_POST['especialidade_medico'];

        // Atualiza o médico na tabela "medico"
        $sql = "UPDATE medico 
                SET crm_medico = '{$crm}', especialidade_medico = '{$especialidade}'
                WHERE id_medico = {$id_medico}";

        $res = $conn->query($sql);

        // Verifica se a atualização foi bem-sucedida
        if ($res == true) {
            print "<script>alert('Médico editado com sucesso!')</script>";
            print "<script>location.href='?page=listar-medico'</script>";
        } else {
            print "<script>alert('Erro ao editar médico!')</script>";
            print "<script>location.href='?page=listar-medico'</script>";
        }
        break;

    case 'excluir':
        $id_medico = $_POST['id_medico'];

        // Exclui o médico da tabela "medico"
        $sql = "DELETE FROM medico WHERE id_medico = {$id_medico}";

        $res = $conn->query($sql);

        // Verifica se a exclusão foi bem-sucedida
        if ($res == true) {
            print "<script>alert('Médico excluído com sucesso!')</script>";
            print "<script>location.href='?page=listar-medico'</script>";
        } else {
            print "<script>alert('Erro ao excluir o médico!')</script>";
            print "<script>location.href='?page=listar-medico'</script>";
        }
        break;
}
?>
