<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<header> 
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
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
                        <fieldset id="group1">
                            <label class="col-form-label"><b> Cidade de Residencia </b> </label><br>
                            <input type="radio" id="LOCAL-C" name="Residence_city" value="1"> Local <br>
                            <input type="radio" id="NEIGHBOUR-C" name="Residence_city" value="2"> Circunvizinhas <br>
                            <input type="radio" id="FOREIGN-C" name="Residence_city" value="0"> Estrangeiro <br>
                        </fieldset>
                        
                        <fieldset id="group2">
                            <label class="col-form-label"><b>Estado</b> </label><br>
                            <input type="radio" id="LOCAL-E" name="State" value="1"> Local <br>
                            <input type="radio" id="NEIGHBOUR-E" name="State" value="2"> Circunvizinhas <br>
                            <input type="radio" id="FOREIGN-E" name="State" value="0"> Estrangeiro <br>
                        </fieldset>

                        <fieldset id="group3">
                            <label class="col-form-label"><b>Província</b> </label><br>
                            <input type="radio" id="LOCAL-P" name="Province" value="1"> Local <br>
                            <input type="radio" id="NEIGHBOUR-P" name="Province" value="0"> Circunvizinhas <br>
                            <input type="radio" id="FOREIGN-P" name="Province" value="2"> Estrangeiro <br>
                        </fieldset>

                        <fieldset id="group4">
                            <label class="col-form-label"><b>Estado Civil</b> </label><br>
                            <input type="radio" id="Single" name="Civil_status" value="3"> Solteiro <br>
                            <input type="radio" id="Married" name="Civil_status" value="1"> Casado <br>
                            <input type="radio" id="Separated" name="Civil_status" value="2"> Separado <br>
                            <input type="radio" id="Free union" name="Civil_status" value="0"> Relacionamento Aberto <br>
                        </fieldset>

                        <fieldset id="group5">
                            <label class="col-form-label"><b>Escolaridade do pai</b></label><br>
                            <input type="radio" id="PRIMARY SCHOOL-P" name="Father_level" value="1"> Ensino fundamental <br>
                            <input type="radio" id="HIGH SCHOOL-P" name="Father_level" value="0"> Ensino médio <br>
                            <input type="radio" id="TECHNICAL-P" name="Father_level" value="2"> Técnico <br>
                            <input type="radio" id="TECHNOLOGIST-P" name="Father_level" value="3"> Tecnologo <br> 
                            <input type="radio" id="UNDERGRADUATE-P" name="Father_level" value="4"> Superior <br>
                            <input type="radio" id="UNREGISTERED-P" name="Father_level" value="5"> Não Registrado <br>
                        </fieldset>

                        <fieldset id="group6">
                            <label class="col-form-label"><b>Escolaridade da mãe</b></label><br>
                            <input type="radio" id="PRIMARY SCHOOL-M" name="Mother_level" value="1"> Ensino fundamental <br>
                            <input type="radio" id="HIGH SCHOOL-M" name="Mother_level" value="0"> Ensino médio <br>
                            <input type="radio" id="TECHNICAL-M" name="Mother_level" value="4"> Técnico <br>
                            <input type="radio" id="TECHNOLOGIST-M" name="Mother_level" value="3"> Tecnologo <br>
                            <input type="radio" id="UNDERGRADUATE-M" name="Mother_level" value="2"> Superior <br>
                            <input type="radio" id="UNREGISTERED-M" name="Mother_level" value="5"> Não Registrado <br>
                        </fieldset>

                        <fieldset id="group7">
                            <label class="col-form-label"><b>Programa de estudo desejado</b></label><br>
                            <input type="radio" id="desired-1" name="Desired_program" value="0"> Tecnologia de Automação Elétrica <br>
                            <input type="radio" id="desired-2" name="Desired_program" value="1"> Engenharia de informática <br>
                            <input type="radio" id="desired-3" name="Desired_program" value="2"> Não especificado <br>
                        </fieldset>

                        <fieldset id="group8">
                            <label class="col-form-label"><b>Nível socioeconomico</b></label><br>
                            <input type="radio" id="nivel-1" name="Socioeconomic_level" value="1"> Nível 1 <br> 
                            <input type="radio" id="nivel-2" name="Socioeconomic_level" value="2"> Nível 2 <br>
                            <input type="radio" id="nivel-3" name="Socioeconomic_level" value="3"> Nível 3 <br>
                            <input type="radio" id="nivel-4" name="Socioeconomic_level" value="4"> Nível 4 <br>
                            <input type="radio" id="nivel-5" name="Socioeconomic_level" value="5"> Nível 5 <br>
                            <input type="radio" id="nivel-6" name="Socioeconomic_level" value="6"> Nível 6 <br>
                        </fieldset>

                        <fieldset id="group9">
                            <label class="col-form-label"><b>Grupo Vulnerável</b></label><br>
                            <input type="radio" id="vuln-1" name="Vulnerable_group" value="-1"> Grupo A <br>
                            <input type="radio" id="vuln-2" name="Vulnerable_group" value="1"> Grupo B <br>
                            <input type="radio" id="vuln-3" name="Vulnerable_group" value="2"> Grupo C <br>
                        <fieldset>

                        <label class="col-form-label"><b>Idade do aluno</b></label><br>
                        <input type="number" id="Age"></label><br>

                        <label class="col-form-label"><b>Média - Exatas</b></label><br>
                        <input type="number" id="STEM_subjects"></label><br>

                        <label class="col-form-label"><b>Média - Humanas</b></label><br>
                        <input type="number" id="H_subjects" ></label><br>

                        <label class="col-form-label"><b>Renda familiar</b></label><br>
                        <input type="number" id="Family_income" ></label><br>
                    </div>
                    <button type="submit" id="btnPrevisorUnitario" class="btn btn-success" onclick = "prever();">Prever</button>
                </div>
            </form> 
</div>
</body>
<script>
    function prever(){
        let Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects;
        
        Residence_city = Number(document.querySelector('input[name="Residence_city"]:checked').value);
        Socioeconomic_level = Number(document.querySelector('input[name="Socioeconomic_level"]:checked').value);
        Civil_status = Number(document.querySelector('input[name="Civil_status"]:checked').value);
        Age = document.getElementById("Age").value;
        State = Number(document.querySelector('input[name="State"]:checked').value);
        Province = Number(document.querySelector('input[name="Province"]:checked').value);
        Vulnerable_group = Number(document.querySelector('input[name="Vulnerable_group"]:checked').value);
        Desired_program = Number(document.querySelector('input[name="Desired_program"]:checked').value);
        Family_income = document.getElementById("Family_income").value;
        Father_level = Number(document.querySelector('input[name="Father_level"]:checked').value);
        Mother_level = Number(document.querySelector('input[name="Mother_level"]:checked').value);
        STEM_subjects = document.getElementById("STEM_subjects").value;
        H_subjects = document.getElementById("H_subjects").value;
        
        //teste alert(Residence_city);

            let xs = tf.tensor2d([[Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects]]);

            output = model.predict(xs);
            const outputData = output.dataSync();
            prediction = Number(outputData > 0.5);

            if(prediction == 0){
                alert('O aluno NÃO corre risco de evasão!');
            }else{
                slert('O aluno CORRE risco de evasão!');
            }
        
    }
</script>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>