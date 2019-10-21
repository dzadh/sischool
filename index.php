<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    
 	include 'library.php';
    
 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php getHeader(); ?>
</head>
<body>
<!--header-banner-section-starts-here -->
<section class="banner-header" id="home">
	<!--header-->
<?php getNav(); ?>
		<!--//header-->
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">

					<div class="carousel-caption">
						<img align="center" src="images/logo.png" style="width: 230px; height: 200px;">
						<br><br>
						<h2>SISchool </h2>
						<p>Kami menyediakan informasi mengenai sekolah yang berada di karesidenan Surakarta</p>
						<a href="#contact" class="scroll">
							<button class="btn btn-primary">Contact us now!</button>
						</a>	
					</div>
				</div>
			</div>
		</div>
		</div>		
    </div> 
	<!-- //banner -->
	
</section>	

<!--//header-banner-section-end-here -->
<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Sekolah</h3>
		<div class="ser-top-grids">
			<div class="col-md-6 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s"><a href="" data-toggle="modal" data-target="#modalSekolah">
					<div class="con-left text-center">
						<div class="spa-ico"><span><i class="fa fa-book" aria-hidden="true"></i></span></div>
						<h5>Daftar Sekolah </h5>
						<p>Ketahui informasi mengenai semua sekolah yang berada di karesidenan Surakarta disini!</p>
						
					</div>
				</a>
			</div>
		<!-- Modal -->
					<div class="modal fade" id="modalSekolah">
					  <div class="modal-dialog 	modal-lg">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title">Daftar Sekolah</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <div><p></p></div>
					      <!-- Modal body -->
					      <div class="modal-body">
					        	<form action="/sischool/search.php" method="get">
					        		<table>
					        			<tr>
					        				<td>Masukan kriteria sekolah</td>
					        			</tr>
					        			<tr>
					        				<td>
					        					<label>Region Sekolah</label>
					        				</td>
					        				<td>
					        						<select name="region" class="form-control">
										        		<?php 
										        		 $cek = mysqli_query($koneksi, "SELECT sekolah_region FROM sekolah group by sekolah_region ");
					  										while ($row = $cek->fetch_object()) {  ?>
                                                        <option value="<?php echo $row->sekolah_region ?>"><?php echo $row->sekolah_region ?></option>
                                                        <?php } ?>
                               						</select>
                                
					        				</td>
					        			</tr>
					        			<tr>
					        				<td>
					        					<label>Jenjang Sekolah</label>
					        				</td>
					        				<td>
					        					<select name="jenjang" class="form-control">
										        		<?php 
										        		 $cek = mysqli_query($koneksi, "SELECT sekolah_jenjang FROM sekolah group by sekolah_jenjang ");
					  										while ($row = $cek->fetch_object()) {  ?>
                                                        <option value="<?php echo $row->sekolah_jenjang ?>"><?php echo $row->sekolah_jenjang ?></option>
                                                        <?php } ?>
                               					</select>
					        				</td>
					        			</tr>
					        			<tr>
					        				<td></td>
					        			</tr>
					        			<tr>
					        				<td></td>
					        			</tr>
					        		</table>
					        		<br><br><button type="submit"  class="btn btn-primary pull-right">Search</button><br><br>
					        	</form>
					      </div>
					    </div>
					  </div>
					</div>
 		<!-- //Modal -->

			<div class="col-md-6 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s"><a href="" data-toggle="modal" data-target="#modalSekolahfav">
					<div class="con-left text-center">
						<div class="spa-ico"><span><i class="fa fa-star" aria-hidden="true"></i></span></div>
						<h5>Sekolah Favorit</h5>
						<p>Telusuri lebih lanjut mengenai sekolah favorit yang berada di karesidenan Surakarta</p>
						
					</div>
				</a>
			</div>
				<!-- Modal -->
					<div class="modal fade" id="modalSekolahfav">
					  <div class="modal-dialog 	modal-lg">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title">Daftar Sekolah Favorit</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <div><p></p></div>
					      <!-- Modal body -->
					      <div class="modal-body">
					        	<form action="/sischool/search.php" method="get">
					        		<table>
					        			<tr>
					        				<td>Masukan kriteria sekolah</td>
					        			</tr>
					        			<tr>
					        				<td>
					        					<label>Region Sekolah</label>
					        				</td>
					        				<td>
					        						<select name="region" class="form-control">
										        		<?php 
										        		 $cek = mysqli_query($koneksi, "SELECT sekolah_region FROM sekolah group by sekolah_region ");
					  										while ($row = $cek->fetch_object()) {  ?>
                                                        <option value="<?php echo $row->sekolah_region ?>"><?php echo $row->sekolah_region ?></option>
                                                        <?php } ?>
                               						</select>
                                
					        				</td>
					        			</tr>
					        			<tr>
					        				<td>
					        					<label>Jenjang Sekolah</label>
					        				</td>
					        				<td>
					        					<select name="jenjang" class="form-control">
										        		<?php 
										        		 $cek = mysqli_query($koneksi, "SELECT sekolah_jenjang FROM sekolah group by sekolah_jenjang ");
					  										while ($row = $cek->fetch_object()) {  ?>
                                                        <option value="<?php echo $row->sekolah_jenjang ?>"><?php echo $row->sekolah_jenjang ?></option>
                                                        <?php } ?>
                               					</select>
					        				</td>
					        			</tr>
					        			
					        		</table>
					        		<br><br><button type="submit" name="fav" value="1" class="btn btn-primary pull-right">Search</button><br><br>
					        	</form>
					      </div>
					    </div>
					  </div>
					</div>
 		<!-- //Modal -->


		
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--//about -->

<!-- professors -->
	<!-- //professor -->
<!--/services -->
<div class="services" id="services">
		<div class="w3-services-head">
			<h3>Services</h3>
		</div>
		<div class="w3-service-grids">
			<div class="w3-service-grid-top1">
				<div class="col-md-4 w3-services-grid1">
						<div class="col-md-4 w3-services-01">
						<h3>01</h3>
						</div>
						<div class="col-md-8 w3-services-heading">
							<p>Memberikan informasi mengenai sekolah-sekolah yang ada di karesidenan Surakarta</p>
						</div>
				</div>
				<div class="col-md-4 w3-services-grid1">
						<div class="col-md-4 w3-services-01">
						<h3>02</h3>
						</div>
						<div class="col-md-8 w3-services-heading">
							<p>Membantu sekolah untuk mempublikasikan dan lebih mengenalkan sekolahnya kepada masyarakat umum</p>
						</div>
				</div>
				<div class="col-md-4 w3-services-grid1">
						<div class="col-md-4 w3-services-01">
							<h3>03</h3>
						</div>
						<div class="col-md-8 w3-services-heading">
							<p>Jalin kerjasama dengan kami untuk mendapatkan promosi konten yang lebih menarik, klik <a href="">info lebih lanjut</a>.</p>
						</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<!--//services -->
<!--/experience overview -->
<!-- //gallery -->
	<!-- <script src="js/lsb.min.js"></script>
	<script>
	$(window).load(function() {
		  $.fn.lightspeedBox();
		});
	</script>
 -->
 <!-- /map -->
<!-- <div class="w3-agile-contact-address" id="contact">
	<div class="w3-agile-contact-head">
	<h3>Contact us</h3>
	</div>
	<div class="w3-agile-contact-grids">
	<div class="agile-contact">
	<div class=" contact-map-right">
		<div id="map">
		 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d387156.4247625735!2d-74.25986630413536!3d40.70349466278063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1445317114078"></iframe>
		      </div>

		</div>
</div> -->
	
	</div>
</div>
<!-- //map -->
<?php getFooter(); ?>
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
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->  
