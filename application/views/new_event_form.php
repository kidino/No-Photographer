<?php

	$input_names = array(
		'event_name',
		'event_desc',
		'slug',
		'date_start',
		'date_end',
		'location',
		'private',
		'event_desc'
	);
	
	$error_class = array(
		'event_name' => '',
		'event_desc' => '',
		'slug' => '',
		'date_start' => '',
		'date_end' => '',
		'location' => '',
		'private' => '',
		'event_desc' => ''
	);
	
	foreach ($input_names as $ipname) {
		if (form_error($ipname) != '') $error_class[$ipname] = ' error';
	}
?>
<?php $this->load->view('layout/header'); ?>

		<div class="row-fluid">
			<div class="span2">
				<?php if ($access_level >= ORGANIZER_LEVEL) { ?><p><a class="btn btn-control" href="">Cancel</a></p><?php } ?>

				<div class="well">
				<p>Enter the details of your events to create a new one.</p>
				</div><!--/.well -->
			</div>
			<div class="span10">
			
  <ul class="pager">
  <li class="previous">
    <a href="<?php echo base_url();?>">&larr; Back Home</a>
  </li>

</ul>

<div class="page-header">
    <h1>Create a New Event</h1>
  </div>
			
				<div class="row">
					<div class="span10">
					
					  <form class="form-horizontal" method="post">
						<fieldset>
						  <div class="control-group<?php echo $error_class['event_name']?>">
							<label class="control-label" for="event_name">Event Name</label>
							<div class="controls">
							  <input type="text" class="input-xlarge" id="event_name" name="event_name" value="<?php echo $this->input->post('event_name'); ?>">
							    <span class="help-inline"><?php echo form_error('event_name');?></span>

							  <!-- <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p> -->
							</div>
						  </div>

						  <div class="control-group<?php echo $error_class['slug']?>">
							<label class="control-label" for="slug">URL Name </label>
							<div class="controls">
							    <span class="help-inline"><?php echo site_url('/');?></span>
<input type="text" class="span2" id="slug" name="slug" value="<?php echo $this->input->post('slug'); ?>">
							    <span class="help-inline"><?php echo form_error('slug');?></span>
							</div>
						  </div>


						  <div class="control-group<?php echo $error_class['location']?>">
							<label class="control-label" for="location">Location</label>
							<div class="controls">
							  <input type="text" class="input-xlarge" id="location" name="location" value="<?php echo $this->input->post('location'); ?>">
							    <span class="help-inline"><?php echo form_error('location');?></span>
							</div>
						  </div>


						  <div class="control-group<?php echo $error_class['date_start']?>">
							<label class="control-label" for="date_start">Start</label>
							<div class="controls">
							  <input type="text" class="span2 datetimepicker" id="date_start" name="date_start" value="<?php echo $this->input->post('date_start'); ?>">
							    <span class="help-inline"><?php echo form_error('date_start');?></span>
							</div>
						  </div>
						  
						  <div class="control-group<?php echo $error_class['date_end']?>">
							<label class="control-label" for="date_end">End</label>
							<div class="controls">
							  <input type="text" class="span2 datetimepicker" id="date_end" name="date_end" value="<?php echo $this->input->post('date_end'); ?>">
							    <span class="help-inline"><?php echo form_error('date_end');?></span>
							</div>
						  </div>
						  
						  <div class="control-group<?php echo $error_class['private']?>">
							<label class="control-label" for="private">Login to View</label>
							<div class="controls">
							  <label class="checkbox">
								<input type="checkbox" id="private" name="private" value="Y" <?php echo ($this->input->post('private') == 'Y') ? " checked" : "";?>>
								<span class="help-inline">Requires login to view otherwise will be public access event album</span>
							  </label>
							</div>
						  </div>
						  
						  <!--
						  <div class="control-group">
							<label class="control-label" for="select01">Select list</label>
							<div class="controls">
							  <select id="select01">
								<option>something</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							  </select>
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label" for="multiSelect">Multicon-select</label>
							<div class="controls">
							  <select multiple="multiple" id="multiSelect">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							  </select>
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label" for="fileInput">File input</label>
							<div class="controls">
							  <input class="input-file" id="fileInput" type="file">
							</div>
						  </div>
						  
						  -->

						  <div class="control-group<?php echo $error_class['event_desc']?>">
							<label class="control-label" for="event_desc">Event Details</label>
							<div class="controls">
							  <textarea class="span6" id="event_desc" rows="5" name="event_desc"><?php echo $this->input->post('event_desc'); ?></textarea>
							    <p class="help-block"><?php echo form_error('event_desc');?></p>
							</div>
						  </div>
						  
						  
						  <div class="form-actions">
							<button type="submit" class="btn btn-primary">Save New Event</button>
							<button class="btn">Cancel</button>
						  </div>
						</fieldset>
					  </form>						
						
					</div>

				</div>
			
			</div>
		</div>
	
	

      <!-- Example row of columns -->

	  		
<?php $this->load->view('layout/footer'); ?>
