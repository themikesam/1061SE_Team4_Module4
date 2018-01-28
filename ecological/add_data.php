<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="vendors/css/font-awesome.min.css" rel="stylesheet">
	<link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
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
        <?php echo '<li class="breadcrumb-item">New</li>'?>
        <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="./index.php"><i class="icon-graph"></i> &nbsp;Dashboard</a>
          </div>
        </li>
      </ol>
      <form method="post" action="./controller.php" enctype="multipart/form-data">
      <?php
        require_once("model.php");
        show_add_form();
      ?>
      <input type="hidden" name="op" value="add">
      <input type="submit" value="新增" style="position:relative;left: 35%;">
      <input type="button" onclick="location.href='index.php'" value="取消" style="position:relative;left: 35%;">
      </form>
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