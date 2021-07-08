---
id: doc5
title: Indicadores de Evasão
sidebar_label: Indicadores de Evasão
---

# Seleção de dados
```
1 function dados(previsores, classe){
2    
3     let Residence_city = [], Socioeconomic_level = [], Civil_status = [], Age = [], State = [], Province = [], Vulnerable_group = [], Desired_program = [], Family_income = [], Father_level = [], Mother_level = [], STEM_subjects = [], H_subjects = [];
4
5     let city_local = 0, city_foreign = 0, city_neighbor = 0;
6     let state_local = 0, state_foreign = 0, state_neighbor = 0;
7     let province_local = 0, province_foreign = 0, province_neighbor = 0;
8     let vuln_1 = 0, vuln_2 = 0, vuln_3 = 0;
9     let soc_1 = 0, soc_2 = 0, soc_3 = 0, soc_4 = 0, soc_5 = 0, soc_6 = 0;
10    let civil_single = 0, civil_married = 0, civil_separated = 0, civil_free = 0;
11    let program_unespecified = 0, program_informatic = 0, program_automation = 0;
12    let father_high = 0, father_undergraduate = 0, father_technical = 0, father_primary = 0, father_technologist = 0, father_unregistred = 0;
13    let mother_high = 0, mother_undergraduate = 0, mother_technical = 0, mother_primary = 0, mother_technologist = 0, mother_unregistred = 0;
14    let total_evadidos = 0, total_naoevadidos = 0;
15    let top_1 = [{key: '', value: 0}], top_2 = [{key: '', value: 0}], top_3 = [{key: '', value: 0}], top_4 = [{key: '', value: ''}];
16
17    for(i in classe){
18        if(classe[i] === "YES"){
19            total_evadidos++;
20
21            if(previsores["Residence_city"][i] == 'LOCAL'){
22                city_local++;
23            }else if(previsores["Residence_city"][i] == 'FOREIGN'){
24                city_foreign++;
25            }else if(previsores["Residence_city"][i] == 'NEIGHBOR'){
26                city_neighbor++;
27            }
28            
29            if(previsores["State"][i] == 'LOCAL'){
30                state_local++;
31            }else if(previsores["State"][i] == 'FOREIGN'){
32                state_foreign++;
33            }else if(previsores["State"][i] == 'NEIGHBOR'){
34                state_neighbor++;
35            }
36            
37            if(previsores["Province"][i] == 'LOCAL'){
38                province_local++;
39            }else if(previsores["Province"][i] == 'FOREIGN'){
40                province_foreign++;
41            }else if(previsores["Province"][i] == 'NEIGHBOR'){
42                province_neighbor++;
43            }
44
45            if(previsores["Vulnerable_group"][i] == -1){
46                vuln_1++;
47            }else if(previsores["Vulnerable_group"][i] == 1){
48                vuln_2++;
49            }else if(previsores["Vulnerable_group"][i] == 2){
50                vuln_3++;
51            }
52
53            if(previsores["Socioeconomic_level"][i] == 2){
54                soc_1++;
55            }else if(previsores["Socioeconomic_level"][i] == 1){
56                soc_2++;
57            }else if(previsores["Socioeconomic_level"][i] == 3){
58                soc_3++;
59            }else if(previsores["Socioeconomic_level"][i] == 4){
60                soc_4++;
61            }else if(previsores["Socioeconomic_level"][i] == 5){
62                soc_5++;
63            }else if(previsores["Socioeconomic_level"][i] == 6){
64                soc_6++;
65            }
66
67            if(previsores["Civil_status"][i] == "Single"){
68                civil_single++;
69            }else if(previsores["Civil_status"][i] == "Free union"){
70                civil_free++;
71            }else if(previsores["Civil_status"][i] == "Married"){
72                civil_married++;
73            }else if(previsores["Civil_status"][i] == "Separated"){
75                civil_separated++;
75            }
76
77            if(previsores["Desired_program"][i] == "UNSPECIFIED"){
78                program_unespecified++;
79            }else if(previsores["Desired_program"][i] == "INFORMATIC ENGINEERING"){
80                program_informatic++;
81            }else if(previsores["Desired_program"][i] == "ELECTRONIC AUTOMATION TECHNOLOGY"){
82                program_automation++;
83            }
84
85            if(previsores["Father_level"][i] == "HIGH SCHOOL"){
86                father_high++;
87            }else if(previsores["Father_level"][i] == "TECHNICAL"){
88                father_technical++;
89            }else if(previsores["Father_level"][i] == "UNDERGRADUATE"){
90                father_undergraduate++;
91            }else if(previsores["Father_level"][i] == "PRIMARY SCHOOL"){
92                father_primary++;
93            }else if(previsores["Father_level"][i] == "TECHNOLOGIST"){
94                father_technologist++;
95            }else if(previsores["Father_level"][i] == "UNREGISTERED"){
96                father_unregistred++;
97            }
98
99            if(previsores["Mother_level"][i] == "HIGH SCHOOL"){
100                mother_high++;
101            }else if(previsores["Mother_level"][i] == "TECHNICAL"){
102                mother_technical++;
103            }else if(previsores["Mother_level"][i] == "UNDERGRADUATE"){
104                mother_undergraduate++;
105            }else if(previsores["Mother_level"][i] == "PRIMARY SCHOOL"){
106                mother_primary++;
107            }else if(previsores["Mother_level"][i] == "TECHNOLOGIST"){
108                mother_technologist++;
109            }else if(previsores["Mother_level"][i] == "UNREGISTERED"){
110                mother_unregistred++;
111            }
112
113            Age.push({index: total_evadidos, value: previsores["Age"][i]});
114            Family_income.push({index: total_evadidos, value:previsores["Family_income"][i]});
115            STEM_subjects.push({index: previsores["STEM_subjects"][i], value: previsores["STEM_subjects"][i]});
116            H_subjects.push({index: total_evadidos, value: previsores["H_subjects"][i]});
117        }else{
118            total_naoevadidos++;
119        }
120    }
121    Residence_city.push({
122        index: "Local", value: city_local},
123        {index: "Estrangeiro", value: city_foreign},
124        {index: "Circuvizinhas", value: city_neighbor}
125    );
126
127    State.push({
128        index: "Local", value: state_local},
129        {index: "Estrangeiro", value: state_foreign},
130        {index: "Circuvizinhas", value: state_neighbor}
131    );
132
133    Province.push({
134        index: "Local", value: province_local},
135        {index: "Estrangeiro", value: province_foreign},
136        {index: "Circuvizinhas", value: province_neighbor}
137    );
138
139    Vulnerable_group.push({
140        index: 'Grupo C', value: vuln_1},
141        {index: 'Grupo B', value: vuln_2},
142        {index: 'Grupo A', value: vuln_3
143    });
144
145    Socioeconomic_level.push({
146        index: 'Nível 1', value: soc_1},
147        {index: 'Nível 2', value: soc_2},
148        {index: 'Nível 3', value: soc_3},
149        {index: 'Nível 4', value: soc_4},
150        {index: 'Nível 5', value: soc_5},
151        {index: 'Nível 6', value: soc_6
152    });
153
154    Father_level.push({
155        index: 'Ensino fundamental', value: father_primary},
156        {index: 'Ensino médio', value: father_high},
157        {index: 'Técnico', value: father_technical},
158        {index: 'Tecnologo', value: father_technologist},
159        {index: 'Superior', value: father_undergraduate},
160        {index: 'Não registrado', value: father_unregistred
161    });
```
A função <em>dados</em> é responsável por selecionar e organizar todas as variáveis dos alunos evadidos.

A função recebe como parâmetro um JSON contendo as variáveis previsoras e outro JSON contendo suas respectivas classes. Primeiramente é definido um array para cada tipo de variável (linha 4), depois são definidos contadores para cada uma delas a fim de auxiliar na geração dos gráficos futuramente.

Na linha 17 o JSON classe é percorrido, limitando a apenas os resultados "YES", que refere-se aos alunos evadidos (linha 18). Para cada uma das variáveis é feita uma verificação de seu tipo e feita um incremento do contador referente ao tipo.

Após realizada a contagem de todos os tipos das variáveis, é feita a inserção em suas respectivas listas. A inserção é feita de modo a ser interpretado pela biblioteca de gráficos, sendo <em>index</em> o eixo <strong>x</strong>, que representa o tipo da variável, e seu valor associado, que representa o eixo <strong>y</strong>.

# Geração de gráficos
```
1  Alunos = [{index: 'Evadidos', value: total_evadidos}, {index: 'Nao evadidos', value: total_naoevadidos}];
2
3  tfvis.render.barchart(document.getElementById('plot1'), Alunos , {yLabel: 'Evadidos x Não evadidos', width: 450});
4  tfvis.render.barchart(document.getElementById('plot2'), Residence_city, {yLabel: 'Cidade de residência', width: 450});
5  tfvis.render.barchart(document.getElementById('plot3'), Father_level, {yLabel: 'Escolaridade do pai', width: 450});
6  tfvis.render.barchart(document.getElementById('plot4'), STEM_subjects, {yLabel: 'Média ciências exatas', width: 450});
7  tfvis.render.barchart(document.getElementById('plot5'), Socioeconomic_level, {yLabel: 'Nível socioeconomico', width: 450});
8  tfvis.render.barchart(document.getElementById('plot6'), Vulnerable_group, {yLabel: 'Grupo vulneravel', width: 450});

```
Para cada uma das variáveis é gerado um gráfico de barras, utilizando a biblioteca [<strong><font color = "blue">tfjs-vis </font></strong>](https://github.com/tensorflow/tfjs-vis), passando como parâmetro o array de cada uma das variáveis, a div onde será plotado o gráfico, além o label que descreve o gráfico, e as dimensões do mesmo.