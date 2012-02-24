<?php $this->load->view('layout/header'); ?>

      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>

      </div>

      <!-- Example row of columns -->
      <div class="row">
		<div class="span12">
			<ul id="albums" class="thumbnails">
			
				<?php foreach($events as $ev) {?>
			
				<li class="span3">
				<div class="thumbnail">
				<a href="<?php echo site_url('event/'.$ev['event_id']);?>"><img src="<?php echo $ev['featured_photo'];?>" alt=""></a>
				<h3><?php echo $ev['event_name'];?></h3>
					<p><?php echo $ev['date_start'];?><br><?php echo $ev['location'];?></p>
					<p>Tags <span class="label label-info"><?php echo $ev['total_tags'];?></span> &nbsp; 
					Photos <span class="label label-info"><?php echo $ev['total_photos'];?></span> &nbsp; 
					Attendees <span class="label label-info"><?php echo $ev['total_attendees'];?></span></p>
				</div>
				</li>
				<?php } ?>
				<!-- ... album ... -->
			</ul>		  

		</div>
      </div>
	  
	  
	  <div class="row">
		<div class="span12">
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
	  
<?php $this->load->view('layout/footer'); ?>
