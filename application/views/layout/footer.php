      <div class="row">
		<div class="span12">

		</div>
      </div>      <div class="row">
		<div class="span12">

		</div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

	  </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('js/jq.js');?>"></script>
    <script src="<?php echo base_url('js/jqui.js');?>"></script>
    <script src="<?php echo base_url('js/datetimepicker.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-transition.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-alert.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-modal.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-dropdown.js');?>"></script>

    <script src="<?php echo base_url('js/bootstrap-scrollspy.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-tab.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-tooltip.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-popover.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-button.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-collapse.js');?>"></script>

    <script src="<?php echo base_url('js/bootstrap-carousel.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap-typeahead.js');?>"></script>
    <script src="<?php echo base_url('js/jq.mason.js');?>"></script>
	
	<script>
	$('#albums').masonry({
  itemSelector: '.span3',
  columnWidth: 100
});

	$(function() {	
		
		$('#date_start').datetimepicker({
			dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss', separator: ' ',
			onClose: function(dateText, inst) {
				var endDateTextBox = $('#date_end');
				if (endDateTextBox.val() != '') {
					var testStartDate = new Date(dateText);
					var testEndDate = new Date(endDateTextBox.val());
					if (testStartDate > testEndDate)
						endDateTextBox.val(dateText);
				}
				else {
					endDateTextBox.val(dateText);
				}
			},
			onSelect: function (selectedDateTime){
				var start = $(this).datetimepicker('getDate');
				$('#example16_end').datetimepicker('option', 'minDate', new Date(start.getTime()));
			}
		});
		$('#date_end').datetimepicker({
			dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss', separator: ' ',
			onClose: function(dateText, inst) {
				var startDateTextBox = $('#date_start');
				if (startDateTextBox.val() != '') {
					var testStartDate = new Date(startDateTextBox.val());
					var testEndDate = new Date(dateText);
					if (testStartDate > testEndDate)
						startDateTextBox.val(dateText);
				}
				else {
					startDateTextBox.val(dateText);
				}
			},
			onSelect: function (selectedDateTime){
				var end = $(this).datetimepicker('getDate');
				$('#example16_start').datetimepicker('option', 'maxDate', new Date(end.getTime()) );
			}
		});		
	});
	
	
	
	
	</script>
	


  </body>
</html>
