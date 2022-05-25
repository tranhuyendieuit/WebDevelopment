   <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="public/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="public/js/demo/chart-area-demo.js"></script>
  <script src="public/js/demo/chart-pie-demo.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
  </script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
      <script>
   CKEDITOR.replace( 'editor', {
        filebrowserUploadUrl: 'http://localhost/tmdt3//public/ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
});
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#submit").click(function(){
            $old_pass = $("#old_pass").val();
            $new_pass = $("#new_pass").val();
            $re_new_pass = $("#re_new_pass").val();
              if ($old_pass == '' || $old_pass == ''|| $re_new_pass == '') {
                    $('#formChangePass .alert').removeClass('hidden');
                    $('#formChangePass .alert-danger').html('vui lòng điền đầy đủ thông tin');
              }
              else{
                      $.ajax({
                      url:'login/new_pass',
                      type: 'POST',
                      data:{
                      old_pass : $old_pass,
                      new_pass : $new_pass,
                      re_new_pass : $re_new_pass
                          },success : function(data){
                      $('#formChangePass .alert').removeClass('hidden');
                          if (data ==1) {
                              $('#old_pass').val([]);
                              $('#new_pass').val([]);
                              $('#re_new_pass').val([]);
                              $('#formChangePass .alert-success').html('Đổi mật khẩu thành công');
                            }
                              else{
                                    $('#formChangePass .alert-success').html(data);
                                  }                                
                               }
                  });
              }
        }); 
      });
    </script>
    <script type="text/javascript">
  $(document).ready(function(){
    $("#ten_san_pham").keyup(function(){
    var name = $("#ten_san_pham").val();
    var re = new RegExp("\\/","g");
    var re2 = new RegExp("\\&","g");
    var re3 = new RegExp("\\+","g");

    name = name.replace(/ /g,"-");
    name = name.replace(re,"-");
    name = name.replace(re2,"-");
    name = name.replace(re3,"-");
    $("#name_search").val(name);
    });
  });
</script>
</body>

</html>
