 <!-- Footer -->
 <footer class="bg-dark small text-center text-white-50">
      <div class="container">
        Copyright &copy; PPyC 2018
        <span class="d-none d-sm-inline">
          | Developed with ♥ by <a href="http://thblckjkr.000webhostapp.com" target="_blank">thblckjkr</a>
        </span>
        <span class="d-none d-md-inline">
          | Generado en <?php echo $this->benchmark->elapsed_time();?>s
        </span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=asset_url()?>js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=asset_url()?>js/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=asset_url()?>js/app.js"></script>

    <!-- Datatables scripts & styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css ">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  </body>
</html>