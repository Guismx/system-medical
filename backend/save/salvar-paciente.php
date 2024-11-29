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
			if ($res == true) {
				print "<script>alert('Cadastrou com sucesso!')</script>";
				print "<script>location.href='?page=listar-paciente'</script>";
			} else {
				print "<script>alert('Erro ao cadastrar !')</script>";
				print "<script>location.href='?page=cadastrar-paciente'</script>";
			};
			break;	

		case 'editar':
			$nome = $_POST['nome_paciente'];
			$cpf = $_POST['cpf_paciente'];
			$email = $_POST['email_paciente'];
			$data_nasc = $_POST['data_nasc_paciente'];
			$sexo_paciente = $_POST['sexo_paciente'];
			$endereco_paciente = $_POST['endereco_paciente'];

			$sql = "UPDATE  paciente SET nome_paciente = '{$nome}', cpf_paciente = '{$cpf}', email_paciente = '{$email}', data_nasc_paciente = '{$data_nasc}', sexo_paciente = '{$sexo_paciente}', endereco_paciente = '{$endereco_paciente}'
					WHERE
						id_paciente = ".$_POST["id_paciente"];


			$res = $conn->query($sql);

			if ($res == true) {
				print "<script>alert('Editou com sucesso!')</script>";
				print "<script>location.href='?page=listar-paciente'</script>";
			} else {
				print "<script>alert('Deu errado !')</script>";
				print "<script>location.href='?page=listar-paciente'</script>";
			};
			break;

		case 'excluir':
		    $id_paciente = $_POST['id_paciente'];

		    $sql = "DELETE FROM paciente WHERE id_paciente = ".$_GET['id_paciente'];

		    $res = $conn->query($sql);

		    if ($res == true) {
		        print "<script>alert('Paciente deletado com sucesso!')</script>";
		        print "<script>location.href='?page=listar-paciente'</script>";
		    } else {
		        print "<script>alert('Erro ao deletar o paciente!')</script>";
		        print "<script>location.href='?page=listar-paciente'</script>";
		    };
		    break;

	}
?>