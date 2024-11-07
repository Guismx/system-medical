<style>
	h1 {
	color: red;
	text-align: center; /* Centraliza o texto dentro do h1 */
	background: #fff;
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

<h1>Listar Médico<h1>
<?php
	$sql = "SELECT * FROM `medico`";

	$res = $conn->query($sql);

	$qtd = $res-> num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd<b> resultado(s)<p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>CRM</th>";
		print "<th>Especialidade</th>";
		print "<th>Ações</th>";
		print "</tr>";

		while ($row = $res-> fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_medico."</td>";
			print "<td>".$row->nome_medico."</td>";
			print "<td>".$row->crm_medico."</td>";
			print "<td>".$row->especialidade_medico."</td>";
			print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-medico&id_medico=".$row->id_medico."';\">Editar</button>

						<button class='btn btn-danger' onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-medico&acao=excluir&id_medico=".$row->id_medico."';}else{false;}\">Excluir</button>
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "Não encontrou resultado";
	}
?>