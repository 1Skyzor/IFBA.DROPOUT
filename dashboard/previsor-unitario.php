<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Previsor de evasões</h1>   
            <form id="formPrevisorUnitario">    
                <div class="modal-body">
                    <div class="form-group">
                    
                    <label for="ingressante" class="col-form-label"><b> É ingressante no período? </b> </label><br>
                    <input type="radio" id="sim-ingressante" name="ingressante" value="Sim">
                    <label for="sim-ingressante">Sim</label><br>
                    <input type="radio" id="nao-ingressante" name="ingressante" value="Não">
                    <label for="nao-ingressante">Não</label><br>

                    <label for="ingressante" class="col-form-label"><b>É cotista?</b> </label><br>
                    <input type="radio" id="sim-cotista" name="cotista" value="Sim">
                    <label for="sim-cotista">Sim</label><br>
                    <input type="radio" id="nao-cotista" name="cotista" value="Não">
                    <label for="nao-cotista">Não</label><br>

                    <label for="ingressante" class="col-form-label"><b>Etinia do aluno </b></label><br>
                    <input type="radio" id="sim-cotista" name="cotista" value="Sim">
                    <label for="amarela/oriental">Amarela/Oriental</label><br>
                    <input type="radio" id="nao-cotista" name="cotista" value="Não">
                    <label for="branca">Branca</label><br>
                    <input type="radio" id="nao-cotista" name="cotista" value="Não">
                    <label for="indigena">Indígena</label><br>
                    <input type="radio" id="nao-cotista" name="cotista" value="Não">
                    <label for="negra">Negra</label><br>
                    <input type="radio" id="nao-cotista" name="cotista" value="Não">
                    <label for="parda">Parda</label><br>

                    <label for="ingressante" class="col-form-label"><b>Sexo do aluno</b></label><br>
                    <input type="radio" id="sim-cotista" name="sexo" value="Sim">
                    <label for="Masculino">Sim</label><br>
                    <input type="radio" id="nao-cotista" name="sexo" value="Não">
                    <label for="Feminino">Não</label><br>

                    <label for="ingressante" class="col-form-label"><b>O aluno é natural do município?</b></label><br>
                    <input type="radio" id="sim-cotista" name="natural" value="Sim">
                    <label for="sim-natural">Sim</label><br>
                    <input type="radio" id="nao-cotista" name="natural" value="Não">
                    <label for="nao-natural">Não</label><br>

                    <label for="ingressante" class="col-form-label"><b>Idade do aluno</b></label><br>
                    <input type="number" id="idade-aluno" name="idade-aluno" ></label><br>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnPrevisorUnitario" class="btn btn-danger">Prever</button>
                </div>
            </form>    

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>