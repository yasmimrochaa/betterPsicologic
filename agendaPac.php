<?php
include_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="style/formulario.css">
	<title>Agendar um Horário</title>

</head>

<body>
	<?php
	if (isset($_SESSION["email"])) {
		require_once("menuPac.php");
	?>
		<h2 style="text-align: center; padding-bottom: 10px;">Agendar um Horário</h2><br>
		<span id="msg"></span>
		<hr> <br>

		<main style="max-width: 500px;">
			<form method="POST" id="agendamentoForm">
				<p style="margin-bottom: 5px; text-align: center;">Selecione o Dia e o Horário de sua preferência</p><br>
				<input class="form-control" type="datetime-local" id="dataHora" name="dataHora" placeholder="Selecione o dia e o horário">
				<br><br>
				<input type="submit" class="btn" style="background-color: #259B9F;" name="agendamentoBtn" id="agendamentoBtn" value="Agendar">
			</form>
		</main>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
		<script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
		<script>
			const msg = document.getElementById("msg");
			const agendamentoForm = document.getElementById("agendamentoForm");
			agendamentoForm.addEventListener("submit", async (e) => {
				e.preventDefault();
				const dadosForm = new FormData(agendamentoForm);
				const dados = await fetch("cadastroEventoPac.php", {
					method: "POST",
					body: dadosForm
				});
				const resposta = await dados.json();
				if (resposta['erro']) {
					msg.innerHTML = resposta['msg'];
				} else {
					msg.innerHTML = resposta['msg'];
				};
				agendamentoForm.reset();
				removerMsg();
			});

			function removerMsg() {
				setTimeout(() => {
					document.getElementById('msg').innerHTML = "";
				}, 10000)
			};



			config = {
				"locale": "pt",
				enableTime: true,
				altInput: true,
				altFormat: "F j, Y  H:i",
				dateFormat: "Y-m-d H:i:s",
				minTime: "08:00",
				maxTime: "18:00",
				time_24hr: true,
				defaultMinute: 0,
				defaultHour: 8,
				"disable": [
					function(date) {
						// return true to disable
						return (date.getDay() === 0 || date.getDay() === 6);

					}
				],

			};
			flatpickr("#dataHora", config);
			const dataHora = document.getElementById("dataHora");
		</script>
	<?php
	} else {
	?>
		<br>
		<div class="alert alert-warning">
			<p>Usuário não autenticado!</p>
			<a href="index.php">Realize o login</a>
		</div>
	<?php
	}
	?>
</body>

</html>