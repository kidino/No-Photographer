<?php $this->load->view('layout/header'); ?>
		<div class="row-fluid">
			<div class="span2">
				<p><a class="btn btn-primary" href="">Upload Photos Here</a></p>

				<div class="well sidebar-nav">
				
				<ul class="nav nav-list">
				  <li class="nav-header">Attendees</li>
				  <li>John Doe</li>
				  <li>Sweet Heart</li>
				  <li>Kareem Abdul-Jabbar</li>
				  <li>Jane Donelly</li>
				  <li>Chris Rock</li>
				  <li>Suhaimi Selamat</li>
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
    <h1>Event Title or Something <br><small>Kuala Lumpur, Malaysia. 12 September 2012</small></h1>
  </div>

 
			<ul id="album" class="thumbnails">
				<?php for ($i = 1; $i <= 9; $i++){ ?>
				<li class="span3 imgthumb">
				<a href="<?php echo site_url('photo/x'); ?>" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
				<a class="close imgdel">&times;</a>
				</li>
				<?php } ?>
			</ul>
		
					
			
				<div class="row">
					<div class="pagination pagination-centered">
			  <ul>
				<li><a href="#">Prev</a></li>
				<li class="active">
				  <a href="#">1</a>
				</li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">Next</a></li>
			  </ul>
			</div>
				</div>
			
			</div>
		</div>
	
	

      <!-- Example row of columns -->

	  		
<?php $this->load->view('layout/footer'); ?>
