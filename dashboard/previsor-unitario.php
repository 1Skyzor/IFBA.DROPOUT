<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<header> 
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
</header>
<body>
<div class="container">
    <h1>Previsor de evasões</h1>   
            <form id="formPrevisorUnitario">    
                <div class="modal-body">
                    <div class="form-group">
                    <label class="col-form-label"><b> Cidade de Residencia </b> </label><br>
                    <input type="radio" id="LOCAL-C" name="Residence_city" value="LOCAL">
                    <label for="LOCAL-C">Local</label><br>
                    <input type="radio" id="NEIGHBOUR-C" name="Residence_city" value="NEIGHBOUR">
                    <label for="NEIGHBOUR-C">Circunvizinhas</label><br>
                    <input type="radio" id="FOREIGN-C" name="Residence_city" value="FOREIGN">
                    <label for="FOREIGN-C">Estrangeiro</label><br>


                    <label class="col-form-label"><b>Estado</b> </label><br>
                    <input type="radio" id="LOCAL-E" name="State" value="LOCAL">
                    <label for="LOCAL-E">Local</label><br>
                    <input type="radio" id="NEIGHBOUR-E" name="State" value="NEIGHBOUR">
                    <label for="NEIGHBOUR-E">Circunvizinhas</label><br>
                    <input type="radio" id="FOREIGN-E" name="State" value="FOREIGN">
                    <label for="FOREIGN-E">Estrangeiro</label><br>
                    

                    <label class="col-form-label"><b>Província</b> </label><br>
                    <input type="radio" id="LOCAL-P" name="Province" value="LOCAL">
                    <label for="LOCAL-P">Local</label><br>
                    <input type="radio" id="NEIGHBOUR-P" name="Province" value="NEIGHBOUR">
                    <label for="NEIGHBOUR-P">Circunvizinhas</label><br>
                    <input type="radio" id="FOREIGN-P" name="Province" value="FOREIGN">
                    <label for="FOREIGN-P">Estrangeiro</label><br>

                    <label class="col-form-label"><b>Estado Civil</b> </label><br>
                    <input type="radio" id="Single" name="Civil_status" value="Single">
                    <label for="Single">Solteiro</label><br>
                    <input type="radio" id="Married" name="Civil_status" value="Married">
                    <label for="Married">Casado</label><br>
                    <input type="radio" id="Separated" name="Civil_status" value="Separated">
                    <label for="Separated">Separado</label><br>
                    <input type="radio" id="Free union" name="Civil_status" value="Free union">
                    <label for="Free union">Relacionamento Aberto</label><br>

                    <label class="col-form-label"><b>Escolaridade do pai</b></label><br>
                    <input type="radio" id="PRIMARY SCHOOL-P" name="Father_level" value="PRIMARY SCHOOL">
                    <label for="PRIMARY SCHOOL-P">Ensino fundamental</label><br>
                    <input type="radio" id="HIGH SCHOOL-P" name="Father_level" value="HIGH SCHOOL">
                    <label for="HIGH SCHOOL-P">Ensino médio</label><br>
                    <input type="radio" id="TECHNICAL-P" name="Father_level" value="TECHNICAL">
                    <label for="TECHNICAL-P">Técnico</label><br>
                    <input type="radio" id="TECHNOLOGIST-P" name="Father_level" value="TECHNOLOGIST">
                    <label for="TECHNOLOGIST-P">Tecnologo</label><br>
                    <input type="radio" id="UNDERGRADUATE-P" name="Father_level" value="UNDERGRADUATE">
                    <label for="UNDERGRADUATE-P">Superior</label><br>
                    <input type="radio" id="UNREGISTERED-P" name="Father_level" value="UNREGISTERED">
                    <label for="UNREGISTERED-P">Não Registrado</label><br>

                    <label class="col-form-label"><b>Escolaridade da mãe</b></label><br>
                    <input type="radio" id="PRIMARY SCHOOL-M" name="Mother_level" value="PRIMARY SCHOOL">
                    <label for="PRIMARY SCHOOL-M">Ensino fundamental</label><br>
                    <input type="radio" id="HIGH SCHOOL-M" name="Mother_level" value="HIGH SCHOOL">
                    <label for="HIGH SCHOOL-M">Ensino médio</label><br>
                    <input type="radio" id="TECHNICAL-M" name="Mother_level" value="TECHNICAL">
                    <label for="TECHNICAL-M">Técnico</label><br>
                    <input type="radio" id="TECHNOLOGIST-M" name="Mother_level" value="TECHNOLOGIST">
                    <label for="TECHNOLOGIST-M">Tecnologo</label><br>
                    <input type="radio" id="UNDERGRADUATE-M" name="Mother_level" value="UNDERGRADUATE">
                    <label for="UNDERGRADUATE-M">Superior</label><br>
                    <input type="radio" id="UNREGISTERED-M" name="Mother_level" value="UNREGISTERED">
                    <label for="UNREGISTERED-M">Não Registrado</label><br>

                    <label class="col-form-label"><b>Programa de estudo desejado</b></label><br>
                    <input type="radio" id="desired-1" name="Desired_program" value="ELECTRONIC AUTOMATION TECHNOLOGY">
                    <label for="desired-1">Tecnologia de Automação Elétrica</label><br>
                    <input type="radio" id="desired-2" name="Desired_program" value="INFORMATIC ENGINEERING">
                    <label for="desired-2">Engenharia de informática</label><br>
                    <input type="radio" id="desired-3" name="Desired_program" value="UNSPECIFIED">
                    <label for="desired-3">Não especificado</label><br>

                    <label class="col-form-label"><b>Nível socioeconomico</b></label><br>
                    <input type="radio" id="nivel-1" name="Socioeconomic_level" value="1">
                    <label for="nivel-1">A</label><br>
                    <input type="radio" id="nivel-2" name="Socioeconomic_level" value="2">
                    <label for="nivel-2">B</label><br>
                    <input type="radio" id="nivel-3" name="Socioeconomic_level" value="3">
                    <label for="nivel-3">C</label><br>
                    <input type="radio" id="nivel-4" name="Socioeconomic_level" value="4">
                    <label for="nivel-4">D</label><br>
                    <input type="radio" id="nivel-5" name="Socioeconomic_level" value="5">
                    <label for="nivel-5">E</label><br>
                    <input type="radio" id="nivel-6" name="Socioeconomic_level" value="6">
                    <label for="nivel-6">F</label><br>

                    <label class="col-form-label"><b>Grupo Vulnerável</b></label><br>
                    <input type="radio" id="vuln-1" name="Vulnerable_group" value="-1">
                    <label for="vuln-1">A</label><br>
                    <input type="radio" id="vuln-2" name="Vulnerable_group" value="1">
                    <label for="vuln-2">B</label><br>
                    <input type="radio" id="vuln-3" name="Vulnerable_group" value="2">
                    <label for="vuln-3">C</label><br>
 

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
                    <button type="submit" id="btnPrevisorUnitario" class="btn btn-success" onclick = learnLinear(>Prever</button>
                </div>
            </form>    
 </div>
</body>

<script>
    async function learnLinear(){
        const model = tf.sequential();
        model.add(tf.layers.dense({units: 17, input_dim: 13}));
        model.add(tf.layers.dense({units: 17}));
        model.add(tf.layers.dense({units: 1}));

        model.compile({
            loss: 'meanSquaredError',
            optimizer: 'sgd'
        });
        let Residence_city = documment.getElementByName('Residence_city').value;
        let Socioeconomic_level = document.getElementByName('Socioeconomic_level').value;
        let Civil_status = document.getElementByName('Civil_status').value;
        let Age = document.getElementByName('Age').value;
        let State = document.getElementByName('State').value;
        let Province = document.getElementByName('Province').value;
        let Vulnerable_group = document.getElementByName('Vulnerable_group').value;
        let Desired_program = document.getElementByName('Desired_program').value;
        let Family_income = document.getElementByName('Family_income').value;
        let Father_level = document.getElementByName('Father_level').value;
        let Mother_level = document.getElementByName('Mother_level').value;
        let STEM_subjects = document.getElementByName('STEM_subjects').value;
        let H_subjects = document.getElementByName('H_subjects').value;

        let x_test = [Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects];

        const x = require('../models/datasets/previsores.json');
        const y = require('../models/datasets/classe.json');
        const xs = tf.tensor2d(x, [274,13]);
        const ys = tf.tensor2d(y, [274,]);

        await model.fit(xs, ys, {epochs: 1500});
        previsao = model.predict(tf.tensor2d(x_test, [1, 1]))
        alert(previsao)
    }
    learnLinear();
</script>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>