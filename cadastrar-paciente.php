<h1>Cadastrar Paciente</h1>
<form action="?page=salvar-paciente" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome_paciente" class="form-control">
	</div>
	<div class="mb-3">
		<label>CPF</label>
		<input type="text" name="cpf_paciente" class="form-control">
	</div>
	<div class="mb-3">
		<label>E-mail</label>
		<input type="text" name="email_paciente" class="form-control">
	</div>
	<div class="mb-3">
		<label>Data de Nascimento</label>
		<input type="date" name="data_nasc_paciente" class="form-control">
	</div>
	<div class="mb-3">
	    <label>Sexo</label>
	    <div>
	        <input type="radio" id="masculino" name="sexo_paciente" value="masculino" class="form-check-input">
	        <label for="masculino" class="form-check-label">Masculino</label>
	    </div>
	    <div>
	        <input type="radio" id="feminino" name="sexo_paciente" value="feminino" class="form-check-input">
	        <label for="feminino" class="form-check-label">Feminino</label>
	    </div>
	</div>
	<div class="mb-3">
		<label>Endereço</label>
		<input type="text" name="endereco_paciente" class="form-control">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>