<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Captura os dados do formulário
        $data = $_POST['data_consulta'];
        $hora = $_POST['hora_consulta'];
        $descricao = $_POST['desc_consulta'];
        $id_medico = $_POST['id_medico']; // Captura o ID do médico
        $id_paciente = $_POST['id_paciente']; // Captura o ID do paciente

        // Verifica se o médico existe
        $verifica_medico = $conn->query("SELECT * FROM medico WHERE id_medico = '{$id_medico}'");

        // Verifica se o paciente existe na tabela 'usuario' com nivel_acesso 'paciente'
        $verifica_paciente = $conn->query("SELECT * FROM usuario WHERE id_usuario = '{$id_paciente}' AND nivel_acesso = 'paciente'");

        if ($verifica_medico->num_rows == 0) {
            die("Erro: Médico não encontrado.");
        }

        if ($verifica_paciente->num_rows == 0) {
            die("Erro: Paciente não encontrado.");
        }

        // Insere os dados na tabela consulta
        $sql = "INSERT INTO consulta(data_consulta, 
                                      hora_consulta, 
                                      descricao_consulta,
                                      usuario_id_medico, 
                                      usuario_id_paciente)
                VALUES ('{$data}', 
                        '{$hora}', 
                        '{$descricao}', 
                        '{$id_medico}', 
                        '{$id_paciente}')";

        $res = $conn->query($sql);

        // Executa a query
        if ($res == true) {
            print "<script>alert('Consulta cadastrada com sucesso!')</script>";
            print "<script>location.href='?page=listar-consulta'</script>";
        } else {
            print "<script>alert('Erro ao cadastrar consulta !')</script>";
            print "<script>location.href='?page=listar-consulta'</script>";
        };
        break;
}
?>
