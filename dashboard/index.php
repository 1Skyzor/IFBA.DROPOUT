<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Início</h1>  
    <head>
        <meta charset="utf-8" />
        <title>Chart.js demo</title>
        <!-- import plugin script -->
    <style>
      .plot {
        display: inline-block;
        margin: 4px;
      }
    </style>
    </head>
    <body>
        <br><br>
        <h4> Gráficos indicadores de evasão escolar </h4>
        <!-- <div class="plot" id="plot1"></div>
        <div class="plot" id="plot2"></div>
        <div class="plot" id="plot3"></div>
        <div class="plot" id="plot4"></div>
        <div class="plot" id="plot5"></div>
        <div class="plot" id="plot6"></div> -->
        <div class="plot" id="plot7"></div>
        <div class="plot" id="plot8"></div>
    </body>

    <div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card mt-6">
						<div class="card-header">Evadidos x Não Evadidos</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
							<div class="plot" id="plot1"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mt-6">
						<div class="card-header">Cidade de Residência</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
							<div class="plot" id="plot2"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mt-4 mb-6">
						<div class="card-header">Nível de Escolaridade do Pai</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
							<div class="plot" id="plot3"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mt-4 mb-6">
						<div class="card-header">Média em Exatas</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
              <div class="plot" id="plot4"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mt-4 mb-6">
						<div class="card-header">Nível Socioeconômico</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
              <div class="plot" id="plot5"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card mt-4 mb-6">
						<div class="card-header">Grupo Vulnerável</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
              <div class="plot" id="plot6"></div>
							</div>
						</div>
					</div>
				</div>
       
        
			</div>
		</div>
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
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"> </script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-vis"></script>
<script type="text/javascript" src = "js/data-graph.js"> </script>
</div>
<!--FIN del cont principal-->


<?php require_once "vistas/parte_inferior.php"?>
