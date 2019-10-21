<!DOCTYPE html>
<?php 
session_start();
include '../connection.php';
if (!isset($_SESSION['username'])){
  echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='index.php';</script>";  
 }
if(ISSET($_SESSION['username'])){
?>
<html>
<head>
  <head>     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galeri Foto</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="dist/img/favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</head>
<body class="skin-blue-light fixed sidebar-mini ">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="adm_pemakalah.php" class="logo">
        <span class="logo-lg"><b>Admin</b></span>
      </a>
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="logout.php?keluar"><i class="fa fa-sign-out"></i> <strong>Logout</strong></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
      </br>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/images.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        </br>
        <p>Welcome, <?=$_SESSION['username']?></p>
      </div>
    </div>
  </br>
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
        <li class="treeview">
        <a href="halaman_admin.php">
          <i class="fa fa-home"></i>
          <span>Kelola Sekolah</span>
        </a>
      </li>       
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-star"></i> <span>Kelola Favorit</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li ><a href="halaman_favorit.php"><i class="fa fa-list"></i> Deskripsi</a></li>
          <li><a href="halaman_guru.php"><i class="fa fa-users"></i>Guru</a></li>
          <li ><a href="halaman_galeri_foto.php"><i class="fa fa-image"></i> Galeri</a></li>
          <li class="active"><a href="#"><i class="fa fa-play"></i> Video</a></li>
        </ul>
      </li> 
      <li class="treeview">
        <a href="register.php">
          <i class="fa fa-user"></i> <span>Tambah Admin</span>
        </a>
      </li>   
    </ul>
</section>
</aside>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Kelola Favorit - Deskripsi
    </h1>
  </br>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li class="active">Kelola Favorit - Deskripsi</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary "><i class="fa fa-plus"></i>Tambah Favorit</button>
        </div>
      </br>
      <div class="box-body">
        <table id="user_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">Edit</th>
              <th width="1%">Delete</th>           
              <th width="5%">Video</th>                
              <th width="5%">ID Video</th>
              <th width="5%">ID Sekolah</th>
                       
            </tr>
          </thead>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
 </div><!-- ./row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<footer class="main-footer tengah">
  <strong>Copyright &copy; 2017 <a href="">SISchool</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->
<script>
  $(function () {
    $(".textarea").wysihtml5();
  });
</script><!-- ./wrapper -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/sweetalert/sweetalert.min.js"></script>
<script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>
</html>

<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Foto</h4>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
            <tr>
              <td>
                <label>Nama Sekolah</label>               
              </td>
              <td>
                <select name="sekolah_id" class="form-control" id="sekolah_id">
                    <?php                         
                      $sql = "SELECT * FROM sekolah WHERE premium = 1";
                      $resultsql = mysqli_query($con, $sql);
                      $jumlah = mysqli_num_rows($resultsql);  
                      if ($jumlah>0) {
                        while($row = mysqli_fetch_assoc($resultsql)){
                          $sekolah_id = $row['sekolah_id'];
                          $sekolah_nama = $row['sekolah_nama'];
                                echo '<option value="'.$sekolah_id.'">'.$sekolah_nama.'</option>';
                            }                       
                        }                           
                    ?>                         
                </select>
              </td>
            </tr>
           <tr>
              <td>
                <label>URL Video</label>         
              </td>
              <td>
                <input type="text" name="video" id="video" class="form-control " required/>
              </td>
            </tr>
          </table>          
        </div>
        <div class="modal-footer">
          <!-- <input type="hidden" name="sekolah_id" id="sekolah_id" /> -->
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript" language="javascript" >
  $(document).ready(function(){
    $('#add_button').click(function(){
      $('#user_form')[0].reset();
      $('.modal-title').text("Form Tambah Sekolah");
      $('#action').val("Add");
      $('#operation').val("Add");
      $('#user_uploaded_image').html('');
    });

    var dataTable = $('#user_data').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"fetchvideo.php",
        type:"POST"
      },
      "columnDefs":[
      {
        "targets":[0, 3,3],
        "orderable":false,
      },
      ],

    });

    $(document).on('submit', '#user_form', function(event){
      event.preventDefault();
      var sekolah_id = $('#sekolah_id').val();
      var video = $('#video').val();
      /*var extension = $('#user_image').val().split('.').pop().toLowerCase();
      if(extension != '')
      {
        if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
        {
          alert("Invalid Image File");
          $('#user_image').val('');
          return false;
        }
      } */
      if(sekolah_id != '' && video != '')
      {
        $.ajax({
          url:"insertvideo.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            $('#user_form')[0].reset();
            /*          $('#userModal').modal('hide');*/
            dataTable.ajax.reload();
          }
        });
      }
      else
      {
        alert("Both Fields are Required");
      }
    });

    $(document).on('click', '.update', function(){
      var video_id = $(this).attr("video_id");
      $.ajax({
        url:"fetch_update_video.php",
        method:"POST",
        data:{video_id:video_id},
        dataType:"json",
        success:function(data)
        {
          $('#userModal').modal('show');
          $('#video').val(data.video);
          $('.modal-title').text("Edit data Video");
          $('#id_foto').val(id_foto);
          $('#action').val("Edit");
          $('#operation').val("Edit");
        }
      })
    });

    $(document).on('click', '.delete', function(){
      var video_id = $(this).attr("video_id");
      if(confirm("Are you sure you want to delete this?"))
      {
        $.ajax({
          url:"delete_video.php",
          method:"POST",
          data:{video_id:video_id},
          success:function(data)
          {
            dataTable.ajax.reload();
          }
        });
      }
      else
      {
        return false; 
      }
    });

  });
</script>
<?php 
}else{
echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='login.php';</script>";  
}
?>
