ByteLengthQueuingStrategy.test("Teste de geração de gráficos", function(assert){
    assert.equal(dados(1, 2), document.getElementById('plot1').length, "Com argumentos numéricos");
});

QUnit.test("Teste valida email", (assert)=>{
    assert.ok(false, "Verifica email valido");
});