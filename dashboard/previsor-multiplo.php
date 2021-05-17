<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Previsor de evasões</h1>   
    <br><br>
    <form id="formPrevisorMultiplo">    
        <label for="cursos" >Selecione o curso:</label>
        <select name="cursos" id="cursos">
            <option value="integrado">Integrado</option>
            <option value="subsequente">Subsequente</option>
            <option value="BSI">BSI</option>
        </select>
        <br><br>
        <label>Selecionar Planilha:</label><br>
        <input type="file" class="btn btn-success" data-dismiss="modal"></input>
        <div class="modal-footer">
            <button type="submit" id="btnPrevisorMultiplo" class="btn btn-danger">Prever</button>
        </div>
    </form>    

  
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>