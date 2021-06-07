<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<body>
<div class="container">
    <h1>Previsor de evasões</h1>   
            <form id="formPrevisorUnitario">    
                <div class="modal-body">
                    <div class="form-group">
                    <label for="ingressante" class="col-form-label"><b> Cidade de Residencia </b> </label><br>
                    <input type="radio" id="local" name="Cidade" value="Sim">
                    <label for="sim-ingressante">Local</label><br>
                    <input type="radio" id="circuvizinhas" name="Cidade" value="Sim">
                    <label for="sim-ingressante">Circunvizinhas</label><br>
                    <input type="radio" id="outra-cidade" name="Cidade" value="Não">
                    <label for="nao-ingressante">Estrangeiro</label><br>


                    <label for="ingressante" class="col-form-label"><b>Estado</b> </label><br>
                    <input type="radio" id="local" name="Estado" value="Sim">
                    <label for="sim-ingressante">Local</label><br>
                    <input type="radio" id="circuvizinhas" name="Estado" value="circuvizinhas">
                    <label for="sim-ingressante">Circunvizinhas</label><br>
                    <input type="radio" id="outra-cidade" name="Estado" value="outra-cidade">
                    <label for="nao-ingressante">Estrangeiro</label><br>
                    

                    <label for="ingressante" class="col-form-label"><b>Província</b> </label><br>
                    <input type="radio" id="local" name="Provincia" value="Sim">
                    <label for="sim-ingressante">Local</label><br>
                    <input type="radio" id="circuvizinhas" name="Provincia" value="Sim">
                    <label for="sim-ingressante">Circunvizinhas</label><br>
                    <input type="radio" id="outra-cidade" name="Provincia" value="Não">
                    <label for="nao-ingressante">Estrangeiro</label><br>

                    <label for="ingressante" class="col-form-label"><b>Estado Civil</b> </label><br>
                    <input type="radio" id="solteiro" name="estado-civil" value="solteiro">
                    <label for="solteiro">Solteiro</label><br>
                    <input type="radio" id="casado" name="estado-civil" value="casado">
                    <label for="casado">Casado</label><br>
                    <input type="radio" id="separado" name="estado-civil" value="separado">
                    <label for="separado">Separado</label><br>
                    <input type="radio" id="relacionamento-aberto" name="estado-civil" value="relacionamento-aberto">
                    <label for="relacionamento-aberto">Relacionamento Aberto</label><br>

                    <label for="ingressante" class="col-form-label"><b>Escolaridade do pai</b></label><br>
                    <input type="radio" id="fundamental" name="escolaridade-pai" value="fundamental">
                    <label for="sim-natural">Ensino fundamental</label><br>
                    <input type="radio" id="medio" name="escolaridade-pai" value="medio">
                    <label for="nao-natural">Ensino médio</label><br>
                    <input type="radio" id="tecnico" name="escolaridade-pai" value="tecnico">
                    <label for="nao-natural">Técnico</label><br>
                    <input type="radio" id="tecnologo" name="escolaridade-pai" value="tecnologo">
                    <label for="sim-natural">Tecnologo</label><br>
                    <input type="radio" id="superior" name="escolaridade-pai" value="superior">
                    <label for="nao-natural">Superior</label><br>
                    <input type="radio" id="nao-registrado" name="escolaridade-pai" value="nao-registrado">
                    <label for="nao-natural">Não Registrado</label><br>

                    <label for="ingressante" class="col-form-label"><b>Escolaridade da mãe</b></label><br>
                    <input type="radio" id="fundamental" name="escolaridade-mae" value="fundamental">
                    <label for="sim-natural">Ensino fundamental</label><br>
                    <input type="radio" id="medio" name="escolaridade-mae" value="medio">
                    <label for="nao-natural">Ensino médio</label><br>
                    <input type="radio" id="tecnico" name="escolaridade-mae" value="tecnico">
                    <label for="nao-natural">Técnico</label><br>
                    <input type="radio" id="tecnologo" name="escolaridade-mae" value="tecnologo">
                    <label for="sim-natural">Tecnologo</label><br>
                    <input type="radio" id="superior" name="escolaridade-mae" value="superior">
                    <label for="nao-natural">Superior</label><br>
                    <input type="radio" id="nao-registrado" name="escolaridade-mae" value="nao-registrado">
                    <label for="nao-natural">Não Registrado</label><br>

                    <label for="ingressante" class="col-form-label"><b>Idade do aluno</b></label><br>
                    <input type="number" id="idade-aluno" name="idade-aluno" ></label><br>

                    <label for="ingressante" class="col-form-label"><b>Média - Exatas</b></label><br>
                    <input type="number" id="idade-aluno" name="idade-aluno" ></label><br>

                    <label for="ingressante" class="col-form-label"><b>Média - Humanas</b></label><br>
                    <input type="number" id="idade-aluno" name="idade-aluno" ></label><br>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnPrevisorUnitario" class="btn btn-success">Prever</button>
                </div>
            </form>    
 </div>
</body>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>