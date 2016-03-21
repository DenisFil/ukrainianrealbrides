<footer id="footer" class="container-fluid text-center">
    <p>UkrainianRealBrides 2001-2016 &copy; All rights reserved.</p>
  </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>content/admin_interface/js/user_profiles.js"></script>

	<script>
	  $(function () {
	    $("#datepicker").datepicker({ 
	          autoclose: true, 
	          todayHighlight: true
	    }).datepicker('update', new Date());;
	  });

	</script>

	<script>
		$(document).ready(function() {
    		$('#profiles-data').DataTable();
		} );
	</script>

  </body>
</html>