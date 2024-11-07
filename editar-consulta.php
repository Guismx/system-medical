<h1>Editar Consulta</h1>
<?php
	$sql = "SELECT * FROM consulta WHERE id_consulta=".$_REQUEST['id_consulta'];

	$res = $conn->query($sql);

	$row = $res->fetch_object();

?>
<form action="?page=salvar-medico" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_consulta" value="<?php print $row->id_consulta;?>">
	<div class="mb-3">
		<label>Data da Consulta</label>
		<input type="text" name="data_consulta" class="form-control"
		value="<?php print $row->data_consulta; ?>">
	</div>
		<div class="mb-3">
		<label>Hora da Consulta</label>
		<input type="text" name="crm_medico" class="form-control" value="<?php print $row->crm_medico; ?>" >
	</div>
	<div class="mb-3">
		<label>Descrição da Consulta</label>
		<input type="text" name="especialidade_medico" class="form-control" value="<?php print $row->especialidade_medico; ?>">
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