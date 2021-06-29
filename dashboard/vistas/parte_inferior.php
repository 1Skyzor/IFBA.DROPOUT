
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> Copyright <?php echo date('Y'); ?>
             &copy; DROPOUT IFBA - Desenvolvido por Aviário Dev      - Todos os direitos reservados. </span>
            
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Realmente deseja sair?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../bd/logout.php">Sair</a>
  
        </div>
      </div>
    </div>
  </div>
  <!-- Alterar Dados Modal-->
  <div class="modal fade" id="modalAlter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form id="formAltDados" class ="formAltDados" method="POST">    
                <div class="modal-body">
                    <div class="form-group">
                    <label for="senha" class="col-form-label">Senha:</label>
                    <input type="password" id="senhaAtual" name="senhaAtual" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="senha" class="col-form-label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="conf-senha" class="col-form-label">Confirmar Senha:</label>
                    <input type="password" id="conf-senha" name="conf-senha" class="form-control">
                    </div>
                                       

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="submit" id="btnSalvar" class="btn btn-success">Salvar</button>
                </div>
            </form>    
            </div>
        </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

 

  
    <!-- datatables JS -->
    <script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>    
    <!-- código propio JS --> 
    <script type="text/javascript" src="main.js"></script>  
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!--  <script type="text/javascript" src="js/Chart.min.js"></script> -->
    <script type="text/javascript" src="js/charts.js"></script>

    

</body>

</html>
