<?php $this->load->view('layout/header'); ?>

      <div class="row">
		<div class="span12">
				<?php if ($access_level >= ORGANIZER_LEVEL) { ?><p><a class="btn btn-primary btn-control" href="<?php echo site_url('event/new'); ?>">Create a New Event</a></p><?php } ?>
		</div>
	</div>
		
		<?php if($events != null) { 
		
			$ev = array_pop($events);
		
		?>
		
		
		
		
      <div class="hero-unit">
        <h1><?php echo $ev['event_name'];?></h1>
        <p><?php echo $ev['event_desc']; ?></p>
        <p><a class="btn btn-primary btn-large" href="<?php echo site_url('event/'. $ev['slug']);?>">View Photos &raquo;</a></p>

      </div>

      <!-- Example row of columns -->
      <div class="row">
		<div class="span12">
			<ul id="albums" class="thumbnails">
			
				<?php 
				if (count($events) > 0) {
					foreach($events as $ev) {	?>
			
				<li class="span3">
				<div class="thumbnail">
				<a href="<?php echo site_url('event/'.$ev['slug']);?>">
				<?php $featured_photo = ($ev['featured_photo'] != '') ? $ev['featured_photo'] : base_url('img/260x180.gif'); ?>
				<img src="<?php echo $featured_photo;?>" alt=""></a>
				
				<h3>
				<?php if ($access_level >= ORGANIZER_LEVEL) { ?><span class="label pull-right"><a href="#">EDIT</a></span><?php } ?>
				<?php echo $ev['event_name'];?></h3>
					<p><?php echo $ev['date_start'];?><br><?php echo $ev['location'];?></p>
					<p>Tags <span class="label label-info"><?php echo $ev['total_tags'];?></span> &nbsp; 
					Photos <span class="label label-info"><?php echo $ev['total_photos'];?></span> &nbsp; 
					Attendees <span class="label label-info"><?php echo $ev['total_attendees'];?></span></p>
				</div>
				</li>
				<!-- ... album ... -->
				<?php } // end foreach events
				} // if still has events
				?>
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
	  
	<?php } else { ?>
      <div class="hero-unit">
        <h1>Welcome, but no events created</h1>
        <p>No-Photographer makes taking photos, and getting in photos really fun.</p>
				<?php if ($access_level >= ORGANIZER_LEVEL) { ?><p><a class="btn btn-primary btn-large" href="<?php echo site_url('event/new'); ?>">Create a New Event</a></p><?php } ?>
      </div>		
		
	<?php } ?>
	  
	  

	  
<?php $this->load->view('layout/footer'); ?>
