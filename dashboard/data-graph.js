previsores = require("../models/datasets/previsores.json");
classe = require("../models/datasets/classe.json");

Residence_city = [], Socioeconomic_level = [], Civil_status = [], Age = [], State = [], Province = [], Vulnerable_group = [], Desired_program = [], Family_income = [], Father_level = [], Mother_level = [], STEM_subjects = [], H_subjects = [];

for(i in classe){
    if(classe[i] === "YES"){
        Residence_city.push(previsores["Residence_city"][i]);
        Socioeconomic_level.push(previsores["Socioeconomic_level"][i]);
        Civil_status.push(previsores["Civil_status"][i]);
        Age.push(previsores["Age"][i]);
        State.push(previsores["State"][i]);
        Province.push(previsores["Province"][i]);
        Vulnerable_group.push(previsores["Vulnerable_group"][i]);
        Desired_program.push(previsores["Desired_program"][i]);
        Family_income.push(previsores["Family_income"][i]);
        Father_level.push(previsores["Father_level"][i]);
        Mother_level.push(previsores["Mother_level"][i]);
        STEM_subjects.push(previsores["STEM_subjects"][i]);
        H_subjects.push(previsores["H_subjects"][i]);
    }
}