<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="vendors/css/font-awesome.min.css" rel="stylesheet">
	<link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<style type="text/css">
img.thub
{
  height:85px;
  width:130px;
}
.cl
{
  height:35px;
}
</style>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-primary">NEW</span></a>
          </li>          
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i>Ecological</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="./index.php"><i class="icon-star"></i>Data</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <main class="main">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <?php 
          require_once("model.php");
          $data_id = $_GET['id'];
          echo '<li class="breadcrumb-item">'.mysqli_fetch_assoc(get_Info_by_ID($data_id))['usual_name'].'</li>' ?>
        <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="./index.php"><i class="icon-graph"></i> &nbsp;Dashboard</a>
          </div>
        </li>
      </ol>
      <form method="post" action="./controller.php" enctype="multipart/form-data">
      <?php
        show_data_Info($data_id);
      ?>
      <input type="hidden" name="op" value="mod">
      <input type="submit" value="修改" style="position:relative;left: 45%;">
      
      </form>
      <form method="post" action="./controller.php" enctype="multipart/form-data">
        <input type="hidden" name="op" value="del">
        <?php echo '<input type="hidden" name="id" value="'.$data_id.'">' ?>
        <input type="submit" value="刪除" style="position:relative;left: 45%;">
      </form>
      <br/><br/>
    </main>
  <script src="vendors/js/jquery.min.js"></script>
  <script src="vendors/js/popper.min.js"></script>
  <script src="vendors/js/bootstrap.min.js"></script>
  <script src="vendors/js/pace.min.js"></script>
  <script src="vendors/js/Chart.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/views/main.js"></script>
</body>
</html>