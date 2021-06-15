<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<header> 
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <script>
        async function modelo(){
            model = undefined;
            model = await tf.loadLayersModel("../models/classifiers/tensorflow_rna/model.json");
            if(model != undefined) {console.log("modelo carregado")};
        }
        modelo();
    </script>
</header>
<body>
<div class="container">
    <h1>Previsor de evasões</h1>   
            <form id="formPrevisorUnitario">    
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-form-label"><b> Cidade de Residencia </b> </label><br>
                    <input type="radio" id="LOCAL-C" name="Residence_city" value="1.">
                    <label for="LOCAL-C">Local</label><br>
                    <input type="radio" id="NEIGHBOUR-C" name="Residence_city" value="2.">
                    <label for="NEIGHBOUR-C">Circunvizinhas</label><br>
                    <input type="radio" id="FOREIGN-C" name="Residence_city" value="0.">
                    <label for="FOREIGN-C">Estrangeiro</label><br>


                    <label class="col-form-label"><b>Estado</b> </label><br>
                    <input type="radio" id="LOCAL-E" name="State" value="1">
                    <label for="LOCAL-E">Local</label><br>
                    <input type="radio" id="NEIGHBOUR-E" name="State" value="2">
                    <label for="NEIGHBOUR-E">Circunvizinhas</label><br>
                    <input type="radio" id="FOREIGN-E" name="State" value="0">
                    <label for="FOREIGN-E">Estrangeiro</label><br>
                    

                    <label class="col-form-label"><b>Província</b> </label><br>
                    <input type="radio" id="LOCAL-P" name="Province" value="1">
                    <label for="LOCAL-P">Local</label><br>
                    <input type="radio" id="NEIGHBOUR-P" name="Province" value="0">
                    <label for="NEIGHBOUR-P">Circunvizinhas</label><br>
                    <input type="radio" id="FOREIGN-P" name="Province" value="2">
                    <label for="FOREIGN-P">Estrangeiro</label><br>

                    <label class="col-form-label"><b>Estado Civil</b> </label><br>
                    <input type="radio" id="Single" name="Civil_status" value="3">
                    <label for="Single">Solteiro</label><br>
                    <input type="radio" id="Married" name="Civil_status" value="1">
                    <label for="Married">Casado</label><br>
                    <input type="radio" id="Separated" name="Civil_status" value="2">
                    <label for="Separated">Separado</label><br>
                    <input type="radio" id="Free union" name="Civil_status" value="0">
                    <label for="Free union">Relacionamento Aberto</label><br>

                    <label class="col-form-label"><b>Escolaridade do pai</b></label><br>
                    <input type="radio" id="PRIMARY SCHOOL-P" name="Father_level" value="1">
                    <label for="PRIMARY SCHOOL-P">Ensino fundamental</label><br>
                    <input type="radio" id="HIGH SCHOOL-P" name="Father_level" value="0">
                    <label for="HIGH SCHOOL-P">Ensino médio</label><br>
                    <input type="radio" id="TECHNICAL-P" name="Father_level" value="2">
                    <label for="TECHNICAL-P">Técnico</label><br>
                    <input type="radio" id="TECHNOLOGIST-P" name="Father_level" value="3">
                    <label for="TECHNOLOGIST-P">Tecnologo</label><br>
                    <input type="radio" id="UNDERGRADUATE-P" name="Father_level" value="4">
                    <label for="UNDERGRADUATE-P">Superior</label><br>
                    <input type="radio" id="UNREGISTERED-P" name="Father_level" value="5">
                    <label for="UNREGISTERED-P">Não Registrado</label><br>

                    <label class="col-form-label"><b>Escolaridade da mãe</b></label><br>
                    <input type="radio" id="PRIMARY SCHOOL-M" name="Mother_level" value="1">
                    <label for="PRIMARY SCHOOL-M">Ensino fundamental</label><br>
                    <input type="radio" id="HIGH SCHOOL-M" name="Mother_level" value="0">
                    <label for="HIGH SCHOOL-M">Ensino médio</label><br>
                    <input type="radio" id="TECHNICAL-M" name="Mother_level" value="4">
                    <label for="TECHNICAL-M">Técnico</label><br>
                    <input type="radio" id="TECHNOLOGIST-M" name="Mother_level" value="3">
                    <label for="TECHNOLOGIST-M">Tecnologo</label><br>
                    <input type="radio" id="UNDERGRADUATE-M" name="Mother_level" value="2">
                    <label for="UNDERGRADUATE-M">Superior</label><br>
                    <input type="radio" id="UNREGISTERED-M" name="Mother_level" value="5">
                    <label for="UNREGISTERED-M">Não Registrado</label><br>

                    <label class="col-form-label"><b>Programa de estudo desejado</b></label><br>
                    <input type="radio" id="desired-1" name="Desired_program" value="0">
                    <label for="desired-1">Tecnologia de Automação Elétrica</label><br>
                    <input type="radio" id="desired-2" name="Desired_program" value="1">
                    <label for="desired-2">Engenharia de informática</label><br>
                    <input type="radio" id="desired-3" name="Desired_program" value="2">
                    <label for="desired-3">Não especificado</label><br>

                    <label class="col-form-label"><b>Nível socioeconomico</b></label><br>
                    <input type="radio" id="nivel-1" name="Socioeconomic_level" value="1">
                    <label for="nivel-1">Nível 1</label><br>
                    <input type="radio" id="nivel-2" name="Socioeconomic_level" value="2">
                    <label for="nivel-2">Nível 2</label><br>
                    <input type="radio" id="nivel-3" name="Socioeconomic_level" value="3">
                    <label for="nivel-3">Nível 3</label><br>
                    <input type="radio" id="nivel-4" name="Socioeconomic_level" value="4">
                    <label for="nivel-4">Nível 4</label><br>
                    <input type="radio" id="nivel-5" name="Socioeconomic_level" value="5">
                    <label for="nivel-5">Nível 5</label><br>
                    <input type="radio" id="nivel-6" name="Socioeconomic_level" value="6">
                    <label for="nivel-6">Nível 6</label><br>

                    <label class="col-form-label"><b>Grupo Vulnerável</b></label><br>
                    <input type="radio" id="vuln-1" name="Vulnerable_group" value="-1">
                    <label for="vuln-1">Grupo A</label><br>
                    <input type="radio" id="vuln-2" name="Vulnerable_group" value="1">
                    <label for="vuln-2">Grupo B</label><br>
                    <input type="radio" id="vuln-3" name="Vulnerable_group" value="2">
                    <label for="vuln-3">Grupo C</label><br>
 

                    <label class="col-form-label"><b>Idade do aluno</b></label><br>
                    <input type="number" id="idade-aluno" name="Age" ></label><br>

                    <label class="col-form-label"><b>Média - Exatas</b></label><br>
                    <input type="number" id="media-e" name="STEM_subjects" ></label><br>

                    <label class="col-form-label"><b>Média - Humanas</b></label><br>
                    <input type="number" id="idade-aluno" name="H_subjects" ></label><br>

                    <label class="col-form-label"><b>Renda familiar</b></label><br>
                    <input type="number" id="renda-familiar" name="Family_income" ></label><br>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnPrevisorUnitario" class="btn btn-success" onclick = "prever(); return false;">Prever</button>
                </div>
            </form>    
 </div>
</body>
<script>
    function prever(){
        var Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects;

        Residence_city = Number(document.getElementsByName("Residence_city")[0].value);
        Socioeconomic_level = Number(document.getElementsByName('Socioeconomic_level')[0].value);
        Civil_status = Number(document.getElementsByName('Civil_status')[0].value);
        Age = Number(document.getElementsByName('Age')[0].value);
        State = Number(document.getElementsByName('State')[0].value);
        Province = Number(document.getElementsByName('Province')[0].value);
        Vulnerable_group = Number(document.getElementsByName('Vulnerable_group')[0].value);
        Desired_program = Number(document.getElementsByName('Desired_program')[0].value);
        Family_income = Number(document.getElementsByName('Family_income')[0].value);
        Father_level = Number(document.getElementsByName('Father_level')[0].value);
        Mother_level = Number(document.getElementsByName('Mother_level')[0].value);
        STEM_subjects = Number(document.getElementsByName('STEM_subjects')[0].value);
        H_subjects = Number(document.getElementsByName('H_subjects')[0].value);

        let xs = tf.tensor2d([[Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects]]);

        output = model.predict(xs);
        const outputData = output.dataSync();
        prediction = Number(outputData > 0.5);
        
        
        if(prediction > 0.5){
            alert("O aluno corre risco de evasão!")
        }else{
            alert("O aluno NÃO corre risco de evasão!")
        }
    }
</script>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>