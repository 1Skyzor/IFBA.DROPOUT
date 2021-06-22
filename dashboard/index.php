<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Início</h1>  
    <head>
        <meta charset="utf-8" />
        <title>Chart.js demo</title>
        <!-- import plugin script -->
		<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

		
    </head>
    <body>
    <div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header">Gráfico 1</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header">Gráfico 2</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4 mb-4">
						<div class="card-header">Nível Socioeconômico</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4 mb-4">
						<div class="card-header">Gráfico 4</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="chart4"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4 mb-4">
						<div class="card-header">Gráfico 5</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="chart5"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4 mb-4">
						<div class="card-header">Gráfico 6</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="chart6"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
 <?php
define('PROJECT_ROOT_PATH', __DIR__);

include_once (PROJECT_ROOT_PATH . '/bd/conexao.php');
//include_once '/bd/conexion.php';
$objeto = new Conexao();
$conexao = $objeto->Conectar();

$consulta = "SELECT id, nome, usuario, email FROM usuarios";
$resultado = $conexao->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>  
    
</div>
<!--FIN del cont principal-->


<?php require_once "vistas/parte_inferior.php"?>
