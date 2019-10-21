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
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="/sischool/search.php" >Sekolah</a></li>
						<li><a href="#services" class="scroll">Services</a></li>
						<li>
						<?php 
						if(isset($_GET['id'])){
							$id = $_GET['id']; 
							?>
							<form class="example" action="/sischool/guru.php?>">
							  <input type="text" placeholder="Search" name="search" method='get'>
							  <button type="submit" name="id" value="<?php echo $id; ?>"><i class="fa fa-search"></i></button>
							</form> 

						<?php
						}else { ?>
						<form class="example" action="/sischool/guru.php">
						  <input type="text" placeholder="Search.." name="search" method='get'>
						  <button type="submit"><i class="fa fa-search"></i></button>
						</form>
						<?php } ?> 

						 </li>
					</ul>
				</nav>
			</div>
			</div>
		</nav>
	</div>

	</div>
	<?php 
		$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 8;
	    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
	    if(isset($_GET['id']) and isset($_GET['search'])){
	    	$id=$_GET['id'];
	    	$searcha = $_GET['search'];
	    	$query      = "SELECT * FROM `guru` WHERE sekolah_id = '$id' and nama_guru like '%$searcha%'";
	   		$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
	   		
	    }
		elseif(isset($_GET['id'])){
			$id = $_GET['id'];
			$query      = "SELECT * FROM guru where sekolah_id = '$id'";
			$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
	   		
   		}
   		else{
   			$query      = "SELECT * FROM guru ";
	   		$Paginator  = new Paginator( $koneksi, $query );
	   		$results    = $Paginator->getData( $limit,$page );
   		}
	 ?>
	

<div class="jarallax team" id="professor">
		<div class="team-dot">
			<div class="container">
				<div class="w3-agile-heading team-heading">
					<h3>Guru-guru</h3>
				</div>

<?php
	
 for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
				<div class="agileits-team-grids">
					<div class="col-md-3 agileits-team-grid">
						<div class="team-info">
							<img src="admin/uploads/guru/<?php echo $results->data[$i]['foto_guru']; ?> " alt="">
							<div class="team-caption"> 
								<h4> <?php echo $results->data[$i]['nama_guru']; ?> </h4>
								<p> <?php echo $results->data[$i]['jabatan_guru']; ?></p>
								<ul>
									
									<li><a href="#modalGuru<?php echo $results->data[$i]['nip']; ?>" data-toggle="modal" ><i class="fa fa-list"></i></a></li>
									
								</ul>
							</div>
						</div><br>
					</div>
	
</div>
<!-- Modal -->
					<div class="modal fade" id="modalGuru<?php echo $results->data[$i]['nip']; ?>" role="dialog">
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
					        		<img src="admin/uploads/guru/<?php echo $results->data[$i]['foto_guru'];?>" class="img-responsive"  ">
					        		</div>
					      		</div>

					      		<div class="col-sm-8">
					      				
					        	<div >
					        		<table>
					        			<tr>
					        				<td>Nama</td>
					        				<td> : </td>
					        				<td><?php echo $results->data[$i]['nama_guru']; ?></td>
					        			</tr>
					        			<tr>
					        				<td>NIP</td>
					        				<td> : </td>
					        				<td><?php echo $results->data[$i]['nip']; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Jabatan</td>
					        				<td> : </td>
					        				<td><?php echo $results->data[$i]['jabatan_guru']; ?></td>
					        			</tr>
					        			<tr>
					        				<td>Mata Pelajaran</td>
					        				<td> : </td>
					        				<td><?php echo $results->data[$i]['mapel_guru']; ?></td>
					        			</tr>
					        			<tr>
					        				<td>E-mail</td>
					        				<td> : </td>
					        				<td><?php echo $results->data[$i]['email_guru']; ?></td>
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




<?php endfor; ?>


					<div class="clearfix"> </div>
<div align="center">
	<?php echo $Paginator->createLinksGuru( $links, 'pagination pagination-sm' ); ?> 
</div>
			</div>
		</div>
</div>

<div>
	<?php getFooter(); ?>
</div>

</body>
</html>