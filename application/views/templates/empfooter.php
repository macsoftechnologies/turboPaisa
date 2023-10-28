

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?php echo date('Y');?> <a href="https://macsof.com/">Macsof Of Technologies</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?=base_url();?>assets1/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?=base_url();?>assets1/bundles/echart/echarts.js"></script>
  <script src="<?=base_url();?>assets1/bundles/chartjs/chart.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=base_url();?>assets1/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="<?=base_url();?>assets1/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=base_url();?>assets1/js/custom.js"></script>
  <script>
	  $(document).ready(function () {
	    $('.sidebar-menu').tree()

	    /*Select 2*/
	    $('.select2').select2()

	    /* Tool tip*/
	    $('[data-toggle="tooltip"]').tooltip()

	    /* Alert Fadeout */
	    $('.alert').delay(5000).fadeOut(1000);

	    //Timepicker
	    $('.timepicker').timepicker({
	      showInputs: false
	    })

	    //Date picker
	    $('#datepicker').datepicker({
	      autoclose: true,
	      todayHighlight: true,
	      format: 'dd-mm-yyyy',
	    })

	    $('#todate').datepicker({
	      autoclose: true,
	      todayHighlight: true,
	      format: 'dd-mm-yyyy',
	    })
	})
	</script>
</body>
</html>