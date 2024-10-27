<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            // Captura os dados do formulário
            $data = $_POST['data_consulta'];
            $hora = $_POST['hora_consulta'];
            $descricao = $_POST['desc_consulta'];
            $id_medico = $_POST['id_medico']; // Captura o ID do médico
            $id_paciente = $_POST['id_paciente']; // Captura o ID do paciente
    
            // Verifica se os IDs existem
            $verifica_medico = $conn->query("SELECT * FROM medico WHERE id_medico = '{$id_medico}'");
            $verifica_paciente = $conn->query("SELECT * FROM paciente WHERE id_paciente = '{$id_paciente}'");
    
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
                                          medico_id_medico, 
                                          paciente_id_paciente)
                    VALUES ('{$data}', 
                            '{$hora}', 
                            '{$descricao}', 
                            '{$id_medico}', 
                            '{$id_paciente}')";
    
            // Executa a query
            if ($conn->query($sql) === TRUE) {
                echo "Consulta cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar consulta: " . $conn->error; // Mensagem de erro
            }
            break;
    }
    
?>