<?php $this->load->view('layout/header'); ?>
		<div class="row-fluid">
			<div class="span2">
				<?php if ($access_level >= ORGANIZER_LEVEL) { ?><p><a class="btn btn-primary btn-control" href="<?php echo site_url('event/new'); ?>">Create a New Event</a></p><?php } ?>
				<?php if ($access_level >= ATTENDEE_LEVEL) { ?><p><a class="btn btn-primary btn-control" href="">Upload Photos Here</a></p><?php } ?>
				<?php if ($access_level >= ATTENDEE_LEVEL) { ?><p><a class="btn btn-info btn-control" href="">Tag This Photo</a></p><?php } ?>

				<div class="well sidebar-nav">
				
				<ul class="nav nav-list">
				  <li class="nav-header">Tagged</li>
				  <li><a href="#">John Doe</a></li>
				  <li><a href="#">Sweet Heart</a></li>
				  <li><a href="#">Kareem Abdul-Jabbar</a></li>
				  <li><a href="#">Jane Donelly</a></li>
				  <li><a href="#">Chris Rock</a></li>
				  <li><a href="#">Suhaimi Selamat</a></li>
				</ul>
			  </div><!--/.well -->
			</div>
			<div class="span10">
			
  <ul class="pager">
  <li class="previous">
    <a href="<?php echo base_url();?>">&larr; Back Home</a>
  </li>

</ul>
			
			  <div class="page-header">
				<h1><small class="well pull-right">100/100</small>Event Title or Something <br><small>Kuala Lumpur, Malaysia. 12 September 2012</small></h1>
			</div>

  				<div class="row">
					<div class="span10">
<ul class="pager">
  <li class="previous">
    <a href="#">&larr; Previous</a>
  </li>
  <li>
    <a href="<?php echo site_url('event/x');?>">Top</a>
  </li>
  <li class="next">
    <a href="#">Next &rarr;</a>
  </li>
</ul>
					</div>
				</div>


  
  				<div class="row">
					<div class="span10 imgthumb">
						<a href="#" class="thumbnail"><img src="http://placehold.it/960x600" alt=""></a>
						<?php if ($access_level >= ORGANIZER_LEVEL) { ?><a class="close imgdel">&times;</a><?php } ?>
					</div>
					
				</div>
			
  <div class="page-header">
    <h2>Comments</h1>
  </div>  		
				<div class="row commentitem">
					<div class="span1 offset1">
						<div class="thumbnail"><img src="http://placehold.it/90x90" alt=""></div>
					</div>
					
					<div class="span8">
					<p>Aenean sollicitudin tincidunt lorem, et vehicula odio placerat vitae. Nam laoreet porta eros vitae blandit. Suspendisse neque velit, aliquet eget vehicula ut, venenatis a neque. Donec viverra eros a leo ullamcorper aliquam.</p>
					</div>
					
				</div>
			
				<div class="row commentitem">
					<div class="span1 offset1">
						<div class="thumbnail"><img src="http://placehold.it/90x90" alt=""></div>
					</div>
					
					<div class="span8">
					<p>Aenean sollicitudin tincidunt lorem, et vehicula odio placerat vitae. Nam laoreet porta eros vitae blandit. Suspendisse neque velit, aliquet eget vehicula ut, venenatis a neque. Donec viverra eros a leo ullamcorper aliquam.</p>
					</div>
					
				</div>
				<div class="row commentitem">
					<div class="span1 offset1">
						<div class="thumbnail"><img src="http://placehold.it/90x90" alt=""></div>
					</div>
					
					<div class="span8">
					<p>Aenean sollicitudin tincidunt lorem, et vehicula odio placerat vitae. Nam laoreet porta eros vitae blandit. Suspendisse neque velit, aliquet eget vehicula ut, venenatis a neque. Donec viverra eros a leo ullamcorper aliquam.</p>
					</div>
					
				</div>
				<div class="row commentitem">
					<div class="span1 offset1">
						<div class="thumbnail"><img src="http://placehold.it/90x90" alt=""></div>
					</div>
					
					<div class="span8">
					<p>Aenean sollicitudin tincidunt lorem, et vehicula odio placerat vitae. Nam laoreet porta eros vitae blandit. Suspendisse neque velit, aliquet eget vehicula ut, venenatis a neque. Donec viverra eros a leo ullamcorper aliquam.</p>
					</div>
					
				</div>

<div class="page-header">
    <h2>Add Your Comment</h1>
  </div>  	
				<div class="row">
					<div class="span9 offset1">
						<form>
							<textarea class="span9" rows="5"></textarea>
							<button class="btn btn-primary btn-large" type="submit">Submit</button>
						</form>
					</div>
					

					
				</div>			
			</div>
		</div>	  		
<?php $this->load->view('layout/footer'); ?>
