---
id: doc2
title: Previsão simples
sidebar_label: Previsão Simples
---
O previsor de evasão simples é responsável por estimar a evasão de um único aluno.

## Formulário Previsor de Evasão Simples

```
1    <form id="formPrevisorUnitario" class="formPrevisorUnitario">    
2        <div class="modal-body">
3            <div class="form-group">
4                <fieldset id="group1">
5                    <label class="col-form-label"><b> Cidade de Residencia </b> </label><br>
6                    <input type="radio" id="LOCAL-C" name="Residence_city" value="1"> Local <br>
7                    <input type="radio" id="NEIGHBOUR-C" name="Residence_city" value="2"> Circunvizinhas <br>
8                    <input type="radio" id="FOREIGN-C" name="Residence_city" value="0"> Estrangeiro <br>
9                </fieldset>
10                        
11                <fieldset id="group2">
12                    <label class="col-form-label"><b>Estado</b> </label><br>
13                    <input type="radio" id="LOCAL-E" name="State" value="1"> Local <br>
14                    <input type="radio" id="NEIGHBOUR-E" name="State" value="2"> Circunvizinhas <br>
15                    <input type="radio" id="FOREIGN-E" name="State" value="0"> Estrangeiro <br>
16                </fieldset>
17
18                <fieldset id="group3">
19                    <label class="col-form-label"><b>Província</b> </label><br>
20                    <input type="radio" id="LOCAL-P" name="Province" value="1"> Local <br>
21                    <input type="radio" id="NEIGHBOUR-P" name="Province" value="0"> Circunvizinhas <br>
22                    <input type="radio" id="FOREIGN-P" name="Province" value="2"> Estrangeiro <br>
23                </fieldset>
24
25                <fieldset id="group4">
26                    <label class="col-form-label"><b>Estado Civil</b> </label><br>
27                    <input type="radio" id="Single" name="Civil_status" value="3"> Solteiro <br>
28                    <input type="radio" id="Married" name="Civil_status" value="1"> Casado <br>
29                    <input type="radio" id="Separated" name="Civil_status" value="2"> Separado <br>
30                    <input type="radio" id="Free union" name="Civil_status" value="0"> Relacionamento Aberto <br>
31               </fieldset>
32
33                <fieldset id="group5">
34                    <label class="col-form-label"><b>Escolaridade do pai</b></label><br>
35                    <input type="radio" id="PRIMARY SCHOOL-P" name="Father_level" value="1"> Ensino fundamental <br>
36                    <input type="radio" id="HIGH SCHOOL-P" name="Father_level" value="0"> Ensino médio <br>
37                    <input type="radio" id="TECHNICAL-P" name="Father_level" value="2"> Técnico <br>
38                    <input type="radio" id="TECHNOLOGIST-P" name="Father_level" value="3"> Tecnologo <br> 
39                    <input type="radio" id="UNDERGRADUATE-P" name="Father_level" value="4"> Superior <br>
40                    <input type="radio" id="UNREGISTERED-P" name="Father_level" value="5"> Não Registrado <br>
41                </fieldset>
42
43                <fieldset id="group6">
44                    <label class="col-form-label"><b>Escolaridade da mãe</b></label><br>
45                    <input type="radio" id="PRIMARY SCHOOL-M" name="Mother_level" value="1"> Ensino fundamental <br>
46                    <input type="radio" id="HIGH SCHOOL-M" name="Mother_level" value="0"> Ensino médio <br>
47                    <input type="radio" id="TECHNICAL-M" name="Mother_level" value="4"> Técnico <br>
48                    <input type="radio" id="TECHNOLOGIST-M" name="Mother_level" value="3"> Tecnologo <br>
49                    <input type="radio" id="UNDERGRADUATE-M" name="Mother_level" value="2"> Superior <br>
50                    <input type="radio" id="UNREGISTERED-M" name="Mother_level" value="5"> Não Registrado <br>
51                </fieldset>
52
53                <fieldset id="group7">
54                    <label class="col-form-label"><b>Programa de estudo desejado</b></label><br>
55                    <input type="radio" id="desired-1" name="Desired_program" value="0"> Tecnologia de Automação Elétrica <br>
56                    <input type="radio" id="desired-2" name="Desired_program" value="1"> Engenharia de informática <br>
57                    <input type="radio" id="desired-3" name="Desired_program" value="2"> Não especificado <br>
58                </fieldset>
59
60                <fieldset id="group8">
61                    <label class="col-form-label"><b>Nível socioeconomico</b></label> <button class = "details" onclick = "nivel(); return false">detalhes</button> <br>
62                    <input type="radio" id="nivel-1" name="Socioeconomic_level" value="1"> Nível 1 <br> 
63                    <input type="radio" id="nivel-2" name="Socioeconomic_level" value="2"> Nível 2 <br>
64                    <input type="radio" id="nivel-3" name="Socioeconomic_level" value="3"> Nível 3 <br>
65                    <input type="radio" id="nivel-4" name="Socioeconomic_level" value="4"> Nível 4 <br>
66                    <input type="radio" id="nivel-5" name="Socioeconomic_level" value="5"> Nível 5 <br>
67                    <input type="radio" id="nivel-6" name="Socioeconomic_level" value="6"> Nível 6 <br>
68                </fieldset>
69
70                <fieldset id="group9">
71                    <label class="col-form-label"><b>Grupo Vulnerável</b></label> <button class = "details" onclick = "grupo(); return false">detalhes</button> <br>
72                    <input type="radio" id="vuln-1" name="Vulnerable_group" value="-1"> Grupo A <br>
73                    <input type="radio" id="vuln-2" name="Vulnerable_group" value="1"> Grupo B <br>
74                    <input type="radio" id="vuln-3" name="Vulnerable_group" value="2"> Grupo C <br>
75                            
76                <fieldset>
77
78                <label class="col-form-label"><b>Idade do aluno</b></label><br>
79                <input type="number" id="Age"></label><br>
80
81                <label class="col-form-label"><b>Média - Exatas</b></label><br>
82                <input type="number" id="STEM_subjects"></label><br>
83
84                <label class="col-form-label"><b>Média - Humanas</b></label><br>
85                <input type="number" id="H_subjects" ></label><br>
86
87                <label class="col-form-label"><b>Renda familiar</b></label><br>
88                <input type="number" id="Family_income" ></label><br>
89            </div>
90            <button type="submit" id="btnPrevisorUnitario" class="btn btn-success" onclick = "prever();">Prever</button>
91        </div>
92    </form>
```
O formulário <em>formPrevisorUnitario</em> é responsável por coletar os dados acadêmicos do aluno, para posteriormente estimar sua saída. São conhidos os dados referentes à Cidade de Residencia (linhas 5 à 8), Estado (linhas 12 à 15), Província (linhas 19 à 22), Estado Civil (linhas 27 à 30), Escolaridade do pai (linhas 34 à 40), Escolaridade da mãe (linhas 44 à 50), Programa de estudo desejado (linhas 55 à 57) e Nível socioeconomico (linhas 71 à 75).

O botão <me>Prever</me> (linha 90) invoca a função <strong>prever()</strong>, responsável por realizar as estimativas de evasão.

## Função prever

```
1 function prever(){
2    let Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects;
3        
4    Residence_city = Number(document.querySelector('input[name="Residence_city"]:checked').value);
5    Socioeconomic_level = Number(document.querySelector('input[name="Socioeconomic_level"]:checked').value);
6    Civil_status = Number(document.querySelector('input[name="Civil_status"]:checked').value);
7    Age = document.getElementById("Age").value;
8    State = Number(document.querySelector('input[name="State"]:checked').value);
9    Province = Number(document.querySelector('input[name="Province"]:checked').value);
10    Vulnerable_group = Number(document.querySelector('input[name="Vulnerable_group"]:checked').value);
11    Desired_program = Number(document.querySelector('input[name="Desired_program"]:checked').value);
12    Family_income = document.getElementById("Family_income").value;
13    Father_level = Number(document.querySelector('input[name="Father_level"]:checked').value);
14    Mother_level = Number(document.querySelector('input[name="Mother_level"]:checked').value);
15    STEM_subjects = document.getElementById("STEM_subjects").value;
16    H_subjects = document.getElementById("H_subjects").value;
17        
18    let xs = tf.tensor2d([[Residence_city, Socioeconomic_level, Civil_status, Age, State, Province, Vulnerable_group, Desired_program, Family_income, Father_level, Mother_level, STEM_subjects, H_subjects]]);
19
20    output = model.predict(xs);
21    const outputData = output.dataSync();
22    prediction = Number(outputData > 0.5);
23
24    if(prediction == 0){
25        alert('O aluno NÃO corre risco de evasão!');
26    }else{
27        alert('O aluno CORRE risco de evasão!');
28         
29    }
30 }
```
A previsão simples é realizada através da função <em>prever</em>, também localizada na página <em>previsor-unitario.php</em>. A função recebe os dados do proveniente do formulário nas linhas 4 à 16.

Na linha 18 é instanciado o [<strong><font color = "blue">modelo</font></strong>](doc3.md) de Aprendizado de Máquina para a realização da estimativa de saída do aluno utilizando as variáveis coletadas.

O modelo retorna a probabilidade de o aluno evadir e na linha 24 é feita uma verificação que caracteriza o aluno como evadido caso esta probabilidade seja acima de 50%, do contrário, o estudante é classificado como não-evadido.