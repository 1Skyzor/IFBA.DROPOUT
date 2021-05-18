<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Previsor de evasões</h1>   
    <br><br>
    <form id="formPrevisorMultiplo">    
        <label for="cursos" >Selecione o curso:</label>
        <select name="cursos" id="cursos-multiplo">
            <option value="integrado">Integrado</option>
            <option value="subsequente">Subsequente</option>
            <option value="BSI">BSI</option>
        </select>
        <br><br>
        <label>Selecionar Planilha:</label><br>
        <input type="file" class="btn btn-success" data-dismiss="modal"></input>
        <div class="modal-footer">
            <button type="submit" id="btnPrevisorMultiplo" class="btn btn-success">Prever</button>
        </div>
    </form>    
    <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table id="tabelaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>É ingressante no período?</th>
                                    <th>É cotista?</th>
                                    <th>Etnia</th>                                 
                                    <th>Sexo</th>
                                    <th>É natural do município?</th> 
                                    <th>Idade</th> 
                                   <!--  <th style="display:none;"  >Senha</th> -->
                                    <th><b>Corre risco de evasão?</b></th>
                                    
                                </tr>
                                </tr>
                            </thead>
                            <!-- 
                            <tbody>
                                <?php                            
                                foreach($data as $dat) { 
                                 
                                ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['nome'] ?></td>
                                    <td><?php echo $dat['usuario'] ?></td>
                                    <td><?php echo $dat['email'] ?></td> 
                                    <td><?php echo $dat['tipo'] ?></td>
                                    <td><?php echo $dat['status'] ?></td> 
                                   <!--  <td style="display:none;" ><?php echo $dat['senha'] ?></td>    -->
                                    <td></td>
                                </tr>
                                <?php
                                    }
                                ?>                                
                            </tbody>    
                            -->
                        </table>                    
                        </div>
                    </div>
            </div>  
            <div class="modal-footer">
            <button type="submit" id="btnExportar" class="btn btn-danger">Exportar dados</button>
        </div>
        </div>  
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>