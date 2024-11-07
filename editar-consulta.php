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

<h1>Editar Consulta</h1>
<?php
    $sql = "SELECT * FROM consulta WHERE id_consulta=".$_REQUEST['id_consulta'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar-consulta" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_consulta" value="<?php print $row->id_consulta; ?>">

    <div class="mb-3">
        <label>Data da Consulta</label>
        <input type="text" name="data_consulta" class="form-control" value="<?php print $row->data_consulta; ?>">
    </div>

    <div class="mb-3">
        <label>Hora da Consulta</label>
        <input type="text" name="hora_consulta" class="form-control" value="<?php print $row->hora_consulta; ?>">
    </div>

    <div class="mb-3">
        <label>Descrição da Consulta</label>
        <input type="text" name="descricao_consulta" class="form-control" value="<?php print $row->descricao_consulta; ?>">
    </div>

    <div class="select-medico">
        <?php
            $sql_medico = "SELECT id_medico, nome_medico FROM medico";
            $result_medico = $conn->query($sql_medico);
        ?>
        <label>Médico Responsável</label>
        <select name="id_medico" id="id_medico">
            <option value="">Selecione o Médico</option>
            <?php
                if ($result_medico->num_rows > 0) {
                    while ($medico = $result_medico->fetch_assoc()) {
                        $selected = ($medico['id_medico'] == $row->medico_id_medico) ? 'selected' : '';
                        echo "<option value='{$medico['id_medico']}' {$selected}>{$medico['nome_medico']}</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum médico encontrado</option>";
                }
            ?>
        </select>
    </div>

    <div class="select-paciente">
        <?php
            $sql_paciente = "SELECT id_paciente, nome_paciente FROM paciente";
            $result_paciente = $conn->query($sql_paciente);
        ?>
        <label>Paciente</label>
        <select name="id_paciente" id="id_paciente">
            <option value="">Selecione o Paciente</option>
            <?php
                if ($result_paciente->num_rows > 0) {
                    while ($paciente = $result_paciente->fetch_assoc()) {
                        $selected = ($paciente['id_paciente'] == $row->paciente_id_paciente) ? 'selected' : '';
                        echo "<option value='{$paciente['id_paciente']}' {$selected}>{$paciente['nome_paciente']}</option>";
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
