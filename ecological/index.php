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
                <a class="nav-link" href="index.php"><i class="icon-star"></i>Data</a>
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
        <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-menu d-md-down-none">
          <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="./index.php"><i class="icon-graph"></i> &nbsp;Dashboard</a>
          </div>
        </li>
      </ol>
      <div class="container-fluid">
        <div class="animated fadeIn">  
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <br>
                  <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                      <tr>
                        <th class="text-center"><i class="icon-puzzle"></i></th>
                        <th>ID</th>
                        <th>俗名/學名</th>
                        <th class="text-center">分類</th>
                        <th>簡述</th>
                        <th>活動範圍</th>
                        <th>習性</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        require_once("model.php");
                        show_Info_list(get_All_Info());
                      ?>
                    </tbody>
                  </table>
                  <br/>
                  <form method="post" action="./controller.php" enctype="multipart/form-data">
                  <input type="hidden" name="op" value="toAdd">
                  <input type="submit" value="新增" style="position: relative;left: 45%;">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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