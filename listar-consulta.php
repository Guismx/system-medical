<style>
	h1 {
	color: #00ffe0a6;
	text-align: center; /* Centraliza o texto dentro do h1 */
	background: linear-gradient(to right, #0c0c0c, rgb(29, 29, 29), rgb(29, 29, 29), #0c0c0c);
	max-width: 1200px; /* Largura máxima */
	margin: 0 auto; /* Centraliza o h1 na tela */
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
	max-width: 1200px; /* Definindo a largura máxima */
	width: 100%; /* Garantir que a tabela ocupe 100% da largura disponível até o limite de 1200px */
	margin: 0 auto; /* Centraliza a tabela horizontalmente */
	padding: 0; /* Remover qualquer padding padrão */
	}

	th {
	font-size: 16px;
	font-weight: bold;
	}

	td {
	font-size: 14px;
	}
</style>

<h1>Listar Consulta<h1>
<?php
	$sql = "
    SELECT 
        c.id_consulta, 
        c.data_consulta, 
        c.hora_consulta, 
        c.descricao_consulta, 
        p.nome_paciente, 
        m.nome_medico 
    FROM `consulta` c
    LEFT JOIN `paciente` p ON c.paciente_id_paciente = p.id_paciente
    LEFT JOIN `medico` m ON c.medico_id_medico = m.id_medico
";

	$res = $conn->query($sql);

	$qtd = $res-> num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd<b> resultado(s)<p>";
		print "<table class='table table-bordered '>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome do Paciente</th>";
		print "<th>Data da Consulta</th>";
		print "<th>Hora da Consulta</th>";
		print "<th>Descrição</th>";
        print "<th>Médico Responsável</th>";
        print "<th>Ações</th>";
		print "</tr>";

		while ($row = $res-> fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_consulta."</td>";
            print "<td>".$row->nome_paciente."</td>";
			print "<td>".$row->data_consulta."</td>";
			print "<td>".$row->hora_consulta."</td>";
			print "<td>".$row->descricao_consulta."</td>";
            print "<td>".$row->nome_medico."</td>";
			print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-consulta&id_consulta=".$row->id_consulta."';\">Editar</button>

						<button class='btn btn-danger' onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta=".$row->id_consulta."';}else{false;}\">Excluir</button>
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "Não encontrou resultado";
	}
?>