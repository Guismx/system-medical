<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_paciente'];
			$cpf = $_POST['cpf_paciente'];
			$email = $_POST['email_paciente'];
			$data_nasc = $_POST['data_nasc_paciente'];
			$sexo_paciente = $_POST['sexo_paciente'];
			$endereco_paciente = $_POST['endereco_paciente'];

			$sql = "INSERT INTO  paciente(nome_paciente,
										cpf_paciente, 
										email_paciente,
										data_nasc_paciente,
										sexo_paciente,
										endereco_paciente)
				VALUES
					('{$nome}', 
						'{$cpf}', 
					'{$email}',
					'{$data_nasc}',
					'{$sexo_paciente}',
					'{$endereco_paciente}')";

			$res = $conn->query($sql);
			break;	
	}
?>