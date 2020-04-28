
<?php
	$action = 'pendentes';
	require 'tarefa_controller.php';


?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
		
		
		<script>

			function to_delete(id){
				location.href = 'index.php?pag=index&action=brand_realized&id=' + id;
				
				
			}

			function to_edit(id, taks_txt){
				let form = document.createElement('form');
				form.action='idnex.php?pag=index&action=update'
				form.method = 'post'
				form.className = 'row'
				

				let input = document.createElement('input')
				input.type = 'text'
				input.name = 'taks'
				input.className = 'col-9 form-control'
				input.value = taks_txt
				
				
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'
				

				form.appendChild(input);
				form.appendChild(inputId)
				form.appendChild(button);

		
			
				let assignment = document.getElementById('taks_'+id)
				assignment.innerHTML = ''
				assignment.insertBefore(form, assignment[0])
				
			}

			function brand_realized(id){
				location.href = 'index.php?pag=index&action=brand_realized&id=' + id;
			}
			
		
		</script>

		
		
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />
								<? foreach($taks_pending as $key => $taks){ ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
									<? if($taks->status == 'pendente'){ ?>	
										<div id='taks_<?= $taks->id ?>' class="col-sm-9"><?= $taks->assignment?></div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="to_delete(<?= $taks->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="to_edit(<?= $taks->id ?>, '<?= $taks->assignment?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="brand_realized(<?= $taks->id ?>)"></i>
										</div>
									
									<? } ?>
									
									</div>
								<? } ?>
								

							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>