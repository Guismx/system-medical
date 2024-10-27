<h1>Cadastrar Consulta</h1>
<style>
	#id_medico {
		background: rgb(235, 255, 255);
		border-radius: 0.375rem;
		width: 100%;
		height: 2.3rem;
		line-height: 1.5;
	}
	.select-medico{
		justify-content: row;
	}
	#id_medico option {
		background: #18211e;
		color: #00ffe0a6;
	}
	#id_paciente {
		background: rgb(235, 255, 255);
		border-radius: 0.375rem;
		width: 100%;
		height: 2.3rem;
		line-height: 1.5;
	}
	.select-paciente{
		justify-content: row;
		margin-top: 1rem;
		margin-bottom: 1rem;
	}
	#id_paciente option {
		background: #18211e;
		color: #00ffe0a6;
	}
</style>
<form action="?page=salvar-consulta" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Data da Consulta</label>
		<input type="date" name="data_consulta" class="form-control">
	</div>
	<div class="mb-3">
		<label>Hora da Consulta</label>
		<input type="datetime-local" name="hora_consulta" class="form-control">
	</div>
	<div class="mb-3">
		<label>Descrição da Consulta</label>
		<input type="text" name="desc_consulta" class="form-control">
	</div>
	<div class="select-medico">
			<?php
				$sql = "SELECT id_medico, nome_medico FROM medico";
				$result = $conn->query($sql);
			?>
		<label>Médico Responsável</label>
		<select name="id_medico" id="id_medico">
			<option value="" >Selecione o Médico</option>
            <?php
            // Preenche as opções com os médicos do banco de dados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id_medico']}'>{$row['nome_medico']}</option>";
                }
            } else {
                echo "<option value=''>Nenhum médico encontrado</option>";
            }
            ?>
		</select>
	</div>
	<div class="select-paciente">
		<?php
			$sql = "SELECT id_paciente, nome_paciente FROM paciente";
			$result = $conn->query($sql);
		?>
		<label>Paciente</label>
		<select name="id_paciente" id="id_paciente">
			<option value="">Selecione o Paciente</option>
            <?php
            // Preenche as opções com os médicos do banco de dados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id_paciente']}'>{$row['nome_paciente']}</option>";
                }
            } else {
                echo "<option value=''>Nenhum paciente encontrado</option>";
            }
            ?>
		</select>
	</div>		
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>