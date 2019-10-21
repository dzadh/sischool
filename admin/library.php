<?php 
 require_once 'paginator.class.php';
	$host = "localhost"; // server
    $user = "root"; // username
    $pass = ""; // password
    $database = "sischool"; // nama database

    $koneksi = mysqli_connect($host, $user, $pass, $database); // menggunakan mysqli_connect

    if (mysqli_connect_errno()) { // mengecek apakah koneksi database error
        echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error(); // pesan ketika koneksi database error
    }

 $_premium=0;
    

	function pagina($kueri){
		global $koneksi;
		$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 8;
	    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
	    echo $kueri;
	  		$query      = $kueri;
	   		$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );

	}

    function getHeader() {

?>

<title>SISchool</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="SISchool sebagai Sistem Informasi Sekolah yang menyediakan informasi mengenai sekolah-sekolah se-karesidenan Surakarta" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/carousel.css" type="text/css" rel="stylesheet" media="all"> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<!-- gallery -->
<link href="css/lsb.css" rel="stylesheet" type="text/css">
<!-- //gallery -->
<!-- /fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic" rel="stylesheet">
<!-- //fonts -->
<!-- //css files -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //js -->

<?php 
    }

function getNav(){

?>


	<div class="header">
		<nav class="navbar navbar-default">
			<div class="container">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li ><a href="index.php">Home</a></li>
						<li><a href="/sischool/search.php" >Sekolah</a></li>
						<li><a href="as"> <p> </p></a></li>
						
						<li>
						<form class="example" action="/sischool/search.php">
						  <input type="text" placeholder="Search.." name="search" method='get'>
						  <button type="submit"><i class="fa fa-search"></i></button>
						</form> 
						 </li>
					</ul>
				</nav>
			</div>
			</div>
		</nav>
	</div>


<?php 
}

function getFooter(){
?>
<div class="footer" id="contact">
	<div class="container">
		<div class="footer-grids-all">
		<div class="footer-w3-grid-top">
			<div class="col-md-4 w3layouts_footer_grid">
				<h3>Contact Us :</h3>
					<ul>
						<li><i class="glyphicon glyphicon-home"></i> Jl. Ir. Sutami No.36A,<span>Jebres, Surakarta, Jawa Tengah 57126 </span></li>
						<li><i class="glyphicon glyphicon-phone"></i> (0271) 646994</li>
						<li><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:example@mail.com"> info@sischool.com</a></li>
					</ul>

			</div>
		</div>
			<div class="col-md-8 w3layouts_footer_grid">
				<ul class="w3l_footer_nav">
					<li><a href="#home" class="active scroll">Home</a></li>
					<li><a href="#about" class="scroll">About</a></li>
					<li><a href="#services" class="scroll">Services</a></li>
				</ul>
				<div class="col-md-6 w3-footer-icons">
				<h3>Catch on</h3>
				<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><a href="mailto:example@mail.com">info@sischool.com</a></p>
				</div>
				<div class="col-md-6 w3-footer-icons">
				<h3>Make call</h3>
				<i class="fa fa-phone" aria-hidden="true"></i><span>(0271) 646994</span>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- <div class="footer-bottom-agile">
				<p>© 2017 Education Portal . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts.</a></p>
			</div>

	</div> -->
</div>
</div>

<?php 
}
function getNavSekolah($premi){

if($premi==1){	
?>
<div class="header">
			<nav class="navbar navbar-default">
				<div class="container">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="#about" class="scroll">About</a></li>
							<li><a href="#services" class="scroll">Video</a></li>
							<li><a href="#gallery" class="scroll">gallery</a></li>
							<li><a href="#professor" class="scroll">Guru</a></li>
							<li><a href="#contact" class="scroll">Contact</a></li>
						</ul>
					</nav>
				</div>
				</div>
			</nav>
					
	</div>
<?php 
}else{ ?>

<div class="header">
			<nav class="navbar navbar-default">
				<div class="container">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="#about" class="scroll">About</a></li>
							<li><a href="#contact" class="scroll">Contact</a></li>
						</ul>
					</nav>
				</div>
				</div>
			</nav>
					
	</div>






<?php 
}

function getGalery($id){
global $koneksi;
	//style="background-color: #333333
?>
	<div class="gallery" id="gallery" ">
		<div class="container">
			<div class="agileits_w3layouts_head">
			<h3>Galeri</h3>
			</div>
			<div class="w3layouts_gallery_grids">
			<?php 
			$cek = mysqli_query($koneksi, "SELECT * FROM galeri where sekolah_id= '$id' ");
					  while ($row = $cek->fetch_object()){
			 ?>
				
				<div class="col-md-4 w3layouts_gallery_grid">
					<a href="admin/uploads/images/<?php echo $row->foto; ?>" class="lsb-preview" data-lsb-group="header">
						<div class="w3layouts_news_grid">
							<img src="admin/uploads/images/<?php echo $row->foto; ?>" alt=" " class="img-responsive">
							<div class="w3layouts_news_grid_pos">
								<div class="wthree_text"><h3><?php echo $row->caption; ?></h3></div>
							</div>
						</div>
					</a><br>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
<?php 
}


function getGuru($id){
global $koneksi;
?>
<div class="jarallax team" id="professor">
		<div class="team-dot">
			<div class="container">
				<div class="w3-agile-heading team-heading">
					<h3>Guru-guru</h3>
				</div>
				<div class="agileits-team-grids">
					<?php 
					$cek = mysqli_query($koneksi, "SELECT * FROM guru where sekolah_id= '$id' limit 4" );
					  while ($row = $cek->fetch_object()){
			 ?>
					<div class="col-md-3 agileits-team-grid">
						<div class="team-info">
							<img src="admin/uploads/guru/<?php echo $row->foto_guru; ?>" alt="">
							<div class="team-caption"> 
								<h4><?php echo $row->nama_guru; ?></h4>
								<p><?php echo $row->jabatan_guru; ?></p>
								<ul>
									
									<li><a href="#modalGuru<?php echo $row->nip; ?>" data-toggle="modal" ><i class="fa fa-list"></i></a></li>
									
								</ul>
							</div>
						</div><br>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="modalGuru<?php echo $row->nip; ?>" role="dialog">
					  <div class="modal-dialog 	modal-lg">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title">Data Guru</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>
					      <div><p></p></div>
					      <!-- Modal body -->
					      <div class="modal-body">
					      	<div class="col-sm-12">
					      		<div class="col-sm-4">
					      			
					      			<div>
					        		<img src="admin/uploads/guru/<?php echo $row->foto_guru; ?>" class="img-responsive"  ">
					        		</div>
					      		</div>

					      		<div class="col-sm-8">
					      				
					        	<div >
					        		<table>
					        			<tr>
					        				<td>Nama</td>
					        				<td> : </td>
					        				<td><?php echo $row->nama_guru; ?></td>
					        			</tr>
					        			<tr>
					        				<td>NIP</td>
					        				<td> : </td>
					        				<td><?php echo $row->nip; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Jabatan</td>
					        				<td> : </td>
					        				<td><?php echo $row->jabatan_guru; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Mata Pelajaran</td>
					        				<td> : </td>
					        				<td><?php echo $row->mapel_guru; ?></td>
					        			</tr>
					        			<tr>
					        				<td>E-mail</td>
					        				<td> : </td>
					        				<td><?php echo $row->email_guru; ?></td>
					        			</tr>
					        		</table>
					        	</div>

					      		</div>

					      	</div>
					        	<div class="container">
					        	
					        	</div>	
					      </div>
					    
					    <div class="modal-footer">
					       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					    </div>
					    </div>
					  </div>
					</div>
 		<!-- //Modal -->
					<?php } ?>
					
					
					<div class="clearfix"> </div>
					<div align="center">

						<a class="btn btn-primary" href="guru.php?id=<?php echo $id; ?> ">Lihat Selengkapnya</a>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php 
}

function getFooterSekolah($id){
global $koneksi;
$cek = mysqli_query($koneksi, "SELECT * FROM sekolah where sekolah_id= '$id'" );
$row = $cek->fetch_object();

?>
<div class="footer" id="contact">
	<div class="container">
		<div class="footer-grids-all">
		<div class="footer-w3-grid-top">
			<div class="col-md-4 w3layouts_footer_grid">
				<h3>Contact Us :</h3>
					<ul>
						<li><i class="glyphicon glyphicon-send"></i> <?php echo $row->sekolah_alamat; ?> </span></li>
						<li><i class="glyphicon glyphicon-phone"></i> <?php echo $row->sekolah_telepon; ?></span></li>
						<li><i class="glyphicon glyphicon-envelope"></i> <a href="<?php echo $row->sekolah_email; ?>"> <?php echo $row->sekolah_email; ?></a></li>
					</ul>

			</div>
		</div>
			<div class="col-md-8 w3layouts_footer_grid">
				
				<div class="col-md-6 w3-footer-icons">
				<h3>Catch on</h3>
				<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><a href="<?php echo $row->sekolah_email; ?>"> <?php echo $row->sekolah_email; ?></a></p>
				</div>
				<div class="col-md-6 w3-footer-icons">
				<h3>Make call</h3>
				<i class="fa fa-phone" aria-hidden="true"></i><span><?php echo $row->sekolah_telepon; ?></span>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		

	</div>
</div>



<?php
}

function getVideos($id){
	global $koneksi;

	$cek = mysqli_query($koneksi, "SELECT * FROM video where sekolah_id= '$id'" );
	 
?>
<div class="services" id="services">
		<div class="container"> 
			<div class="w3-agile-heading team-heading">
				<h3>Video</h3>
			</div>

			<div>
				<iframe  frameborder="0" allowfullscreen width="1280" height="720" src="https://www.youtube.com/embed/?playlist=<?php while($row = $cek->fetch_object()){ echo $row->video;?>,<?php } ?>&controls=1&loop=1"></iframe>
			</div>
		</div>
		
	</div>

</div>








<?php 
}

}
    ?>



