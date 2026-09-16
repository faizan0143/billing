<footer class="main-footer">
				
				<strong>Copyright &copy; <?php echo date('Y'); ?> Stock Management & Billing All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url('assets/js/adminlte.min.js') ?>"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>

<!--Datatable-->

		<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
		<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>
		<script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.js"></script>
		<script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap4.js"></script>

		<!--End Datatable-->

		<!--Jquery Datetime-->
		<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
		<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
		<!--End Jquery Datetime-->
	</body>
</html>

<script>
//  $('#example').DataTable({
//     fixedHeader: false
// });
</script>

<script>
    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each(function (i) {
        var title = $('#example thead th')
            .eq($(this).index())
            .text();
        $(this).html(
            '<input type="text" placeholder="' + title + '" data-index="' + i + '" />'
        );
    });
 
    // DataTable
    var table = $('#example').DataTable({
        fixedColumns: true,
        fixedHeader: false,
         pageLength : 50
    });
 
    // Filter event handler
    $(table.table().container()).on('keyup', 'tfoot input', function () {
        table
            .column($(this).data('index'))
            .search(this.value)
            .draw();
    });
});
</script>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>

</body>

</html>