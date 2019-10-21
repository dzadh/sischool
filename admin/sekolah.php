    
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include 'library.php';
require_once 'paginator.class.php';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php getHeader(); ?>
</head>
<body>
	<?php 
	$id=$_GET['id'];
	$sqlSekolah = "SELECT * from sekolah where sekolah_id ='$id'";
	$sekolah = mysqli_query($koneksi, $sqlSekolah);
	$row=$sekolah->fetch_object();
	 ?>
<!--header-banner-section-starts-here -->
<section class="banner-header" id="home">
		<!--header-->
		<?php getNavSekolah($row->premium); ?>
		<!--//header-->
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<img align="center" src="admin/uploads/logo/<?php echo $row->image; ?>" style="width: 230px; height: 200px;">
						<h2><?php echo $row->sekolah_nama; ?> </h2>
						<p></p>
						<button class="btn btn-primary" data-target="#myModal" data-toggle="modal">Diskripsi</button>
					</div>
				</div>
			</div>			
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
		<div id="myModal" class="modal wthree-modal" tabindex="-1"> 
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3><?php echo $row->sekolah_nama; ?></h3>
				</div>
				<div class="col-md-6 modal-img">
					<img src="admin/uploads/logo/<?php echo $row->image; ?>" class="img-responsive" alt="w3layouts" title="w3layouts">
				</div>
				<div class="col-md-6 modal-text">
					<p class="banner-p1"><?php echo $row->sekolah_deskripsi; ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>		
		
    </div> 
	<!-- //banner -->
	
</section>	

<!--//header-banner-section-end-here -->
<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">about</h3>
		<h3 class="w3-about-title" style="font-size: 16px;"><?php echo $row->sekolah_nama; ?></h3>
		<div class="ser-top-grids">
			<div class="col-md-6 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-book" aria-hidden="true"></i></span></div>
					<h5>Visi </h5>
					<p><?php echo $row->sekolah_visi; ?></p>
					
				</div>
			</div>
			<div class="col-md-6 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></div>
					<h5>Misi</h5>
					<p><?php echo $row->sekolah_misi; ?></p>
					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--//about -->
<?php 
if($row->premium==1){
getVideos($row->sekolah_id);
} ?>


<!-- gallery -->
<?php 
if($row->premium==1){
getGalery($row->sekolah_id);
} ?>

<!-- //gallery -->
	<script src="js/lsb.min.js"></script>
	<script>
	$(window).load(function() {
		  $.fn.lightspeedBox();
		});
	</script>

		<!-- professors -->
	<?php
	if($row->premium==1){ 
	getGuru($row->sekolah_id);} ?>
	<!-- //professor -->

<!--footer-->
	<?php getFooterSekolah($row->sekolah_id); ?>
<!-- //footer -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->  
