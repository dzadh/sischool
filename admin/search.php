<?php 
include 'library.php';
require_once 'paginator.class.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php getHeader(); ?>
</head>
<body>
	<div>
		<?php getNav(); ?>
	</div>
	<?php 
		$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 8;
	    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
	    if(isset($_GET['search'])){
	    	$searcha = $_GET['search'];
	    	$query      = "SELECT * FROM `sekolah` WHERE `sekolah_nama` like '%$searcha%'";
	   		$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
	   		$Paginator->search($searcha);
	    }
		elseif(isset($_GET['fav'])){
			$favorit = $_GET['fav'];
   			$region = $_GET['region'];
			$jenjang = $_GET['jenjang'];
			$query      = "SELECT * FROM sekolah where sekolah_region = '$region' and sekolah_jenjang = '$jenjang' and premium = '$favorit' ";
			$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
	   		$Paginator->favSearch($region,$jenjang);
   		}elseif (isset($_GET['region'])) {	
		 	$region = $_GET['region'];
			$jenjang = $_GET['jenjang'];
			$query      = "SELECT * FROM sekolah where sekolah_region = '$region' and sekolah_jenjang = '$jenjang' ";
			$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
			$Paginator->term($region,$jenjang);
   		}

   		else{
   			$query      = "SELECT * FROM sekolah ";
	   		$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
   		}
	 ?>
	

<div class="jarallax team" id="professor">
		<div class="team-dot">
			<div class="container">
				<div class="w3-agile-heading team-heading">
					<h3>Sekolah</h3>
				</div>

<?php
	
 for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
				<div class="agileits-team-grids">
					<div class="col-md-3 agileits-team-grid">
						<div class="team-info">
							<img src="images/t11.jpg" alt="">
							<div class="team-caption"> 
								<h4> <?php echo $results->data[$i]['sekolah_nama']; ?> </h4>
								<p> <?php echo $results->data[$i]['sekolah_alamat']; ?></p>
								<ul>
									<!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
									<li><a href="/sischool/sekolah.php?id=<?php echo $results->data[$i]['sekolah_id'] ?>"><i class="fa fa-home"></i></a></li>
									<!-- <li><a href="#"><i class="fa fa-rss"></i></a></li> -->
								</ul>
							</div>
						</div><br>
					</div>
	
</div><?php endfor; ?>


					<div class="clearfix"> </div>
<div align="center">
	<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?> 
</div>
			</div>
		</div>
</div>

<div>
	<?php getFooter(); ?>
</div>

</body>
</html>