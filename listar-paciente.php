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

<h1>Listar Paciente</h1>
<?php
	$sql = "SELECT * FROM `paciente`";

	$res = $conn->query($sql);

	$qtd = $res-> num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd<b> resultado(s)<p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>CPF</th>";
		print "<th>E-mail</th>";
		print "<th>Data de Nascimento</th>";
		print "<th>Sexo</th>";
		print "<th>Endereço</th>";
		print "<th>Ações</th>";
		print "</tr>";

		while ($row = $res-> fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_paciente."</td>";
			print "<td>".$row->nome_paciente."</td>";
			print "<td>".$row->cpf_paciente."</td>";
			print "<td>".$row->email_paciente."</td>";
			print "<td>".$row->data_nasc_paciente."</td>";
			print "<td>".$row->sexo_paciente."</td>";
			print "<td>".$row->endereco_paciente."</td>";
			print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-paciente&id_paciente=".$row->id_paciente."';\">Editar</button>

						<button class='btn btn-danger' onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-paciente&acao=excluir&id_paciente=".$row->id_paciente."';}else{false;}\">Excluir</button>
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "Não encontrou resultado";
	}
?>