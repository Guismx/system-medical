<style>
    h1 {
        color: #00ffe0a6;
        text-align: center;
        background: linear-gradient(to right, #0c0c0c, rgb(29, 29, 29), rgb(29, 29, 29), #0c0c0c);
        max-width: 1200px;
        margin: 0 auto;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
        display: block;
        font-size: 1rem;
    }

    table {
        font-size: 14px;
        font-weight: normal;
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        padding: 0;
    }

    th {
        font-size: 16px;
        font-weight: bold;
    }

    td {
        font-size: 14px;
    }
</style>

<h1>Listar Consulta</h1>

<?php
    // Corrigindo a consulta para garantir que a tabela 'usuario' está sendo acessada corretamente
    $sql = "
    SELECT 
        c.id_consulta, 
        c.data_consulta, 
        c.hora_consulta, 
        c.descricao_consulta, 
        p.nome_usuario AS nome_paciente, 
        u.nome_usuario AS nome_medico  /* Agora estamos acessando o nome do médico corretamente */
    FROM consulta c
    LEFT JOIN usuario p ON c.usuario_id_paciente = p.id_usuario  /* Relacionamento com paciente */
    LEFT JOIN medico m ON c.usuario_id_medico = m.usuario_id_usuario  /* Relacionamento com médico */
    LEFT JOIN usuario u ON m.usuario_id_usuario = u.id_usuario  /* Relacionamento com usuário para obter o nome do médico */
    ";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)<p>";
        print "<table class='table table-bordered'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome do Paciente</th>";
        print "<th>Data da Consulta</th>";
        print "<th>Hora da Consulta</th>";
        print "<th>Descrição</th>";
        print "<th>Médico Responsável</th>";
        print "<th>Ações</th>";
        print "</tr>";

        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>".$row->id_consulta."</td>";
            print "<td>".$row->nome_paciente."</td>";
            print "<td>".$row->data_consulta."</td>";
            print "<td>".$row->hora_consulta."</td>";
            print "<td>".$row->descricao_consulta."</td>";
            print "<td>".$row->nome_medico."</td>";
            print "<td>
                        <button class='btn btn-success' onclick=\"location.href='?page=editar-consulta&id_consulta=".$row->id_consulta."';\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta=".$row->id_consulta."';}else{false;}\">Excluir</button>
                    </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "Não encontrou resultado";
    }
?>
