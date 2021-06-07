<?php require_once "vistas/parte_superior.php"?>
<!--INICIO del cont principal-->

<head>
    <link href="css/tabela-previsores.css" rel="stylesheet">
    <script src="js/tabela-previsores.js"></script>
</head>
<body>
<div class="container">
    <h1>Previsor de evasões</h1>   
    <br><br>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype="multipart/form-data">
    <label>Selecione o arquivo no formato CSV:</label><br>
    <input type="file" class="btn btn-success" name = "arquivo" data-dismiss="modal"></input>
    <button type="submit" id="btnPrevisorMultiplo" name = "btnPrevisorMultiplo" class="btn btn-success">Enviar</button>
    </form>
<br><br>

<button id="btnPrevisoes" name = "btnPrevisoes" class="btn btn-danger" onclick = gerarCSV_Multiplo()>Previsões</button>

<?php
    if(isset($_POST['btnPrevisorMultiplo'])){
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        if($extensao == "csv"){
            $pasta = "../data/";
            $temp = $_FILES['arquivo']['tmp_name'];
            $novo_nome = uniqid().".csv";

            $_SESSION['nome_csv'] = $novo_nome;

            if(move_uploaded_file($temp, $pasta.$novo_nome)){
?>
        <script> document.getElementById("btnPrevisoes").style.display = "inline"; </script>
<?php
            }
        }else{
            echo "<b><font color=red> Formato inválido </font></b>";
        }
    }
    unset($_POST['btnPrevisorMultiplo']);
?>

    <div id = "centro-tabela">
        <div class="modal fade" id="modalPrevisaoMultipla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <iframe id = "tabela-previsao" src = "../tabela-previsao.php"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>