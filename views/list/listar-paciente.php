<style>
	h1 {
	color: #00ffe0a6;
	text-align: center;
	background: #fff;
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

<h1>Listar Paciente<h1>
<?php
	$sql = "SELECT * FROM `usuario`";

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
		print "<th>Nível de Acesso</th>";
		print "<th>Ações</th>";
		print "</tr>";

		while ($row = $res-> fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_usuario."</td>";
			print "<td>".$row->nome_usuario."</td>";
			print "<td>".$row->cpf_usuario."</td>";
			print "<td>".$row->email_usuario."</td>";
			print "<td>".$row->data_nasc_usuario."</td>";
			print "<td>".$row->sexo_usuario."</td>";
			print "<td>".$row->endereco_usuario."</td>";
			print "<td>".$row->nivel_acesso."</td>";
			print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-paciente&id_paciente=".$row->id_usuario."';\">Editar</button>

						<button class='btn btn-danger' onclick=\" if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-paciente&acao=excluir&id_paciente=".$row->id_usuario."';}else{false;}\">Excluir</button>
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "Não encontrou resultado";
	}
?>