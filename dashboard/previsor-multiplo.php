<?php require_once "vistas/parte_superior.php"?>
<!--INICIO del cont principal-->

<head>
    <style type = "text/css">
        #tabela-previsao{
            border: none;
            width: 1080px;
            height: 680px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <script>
        function openModal(){
            $("#modalPrevisaoMultipla").modal("show"); 
        }   
    </script>
</head>

<div class="container">
    <h1>Previsor de evasões</h1>   
    <br><br>
    <form id="formPrevisorMultiplo">    
        <label for="cursos" >Selecione o curso:</label>
        <select name="cursos" id="cursos-multiplo">
            <option value="integrado">Integrado</option>
            <option value="subsequente">Subsequente</option>
            <option value="BSI">BSI</option>
        </select>
        <br><br>
        <label>Selecionar Planilha:</label><br>
        <input type="file" class="btn btn-success" data-dismiss="modal"></input>
        <button type="submit" id="btnPrevisorMultiplo" class="btn btn-success" onclick = openModal()>Prever</button>
    </form> 
<br><br>

<div class="modal fade" id="modalPrevisaoMultipla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <iframe id = "tabela-previsao" src = "../tabela-previsao.php"></iframe>
        </div>
    </div>
</div>

 
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>