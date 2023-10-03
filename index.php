<?php   

require_once './config/functions.php';

$getData=$_GET;
$baseFolder='./pages/';
if(isset($getData['page'])){
    if($getData['page']=='logout'){
    
     if(file_exists($baseFolder.$getData['page'].'.php')){
        require_once $baseFolder.$getData['page'].'.php';
    }
  
    
   }


}

?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Panel</title>

<!-- // link -->
<?php require_once './partials/styles.php'; ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- //navbar -->
<?php require_once './partials/navbar.php'; ?>

<!-- // leftside -->
<?php require_once './partials/leftside.php'; ?>

<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Starter Page</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Starter Page</li>
</ol>
</div>
</div>
</div>
</div>


<div class="content">
<div class="container-fluid">
<div class="row">

<!-- // istifadeci tabel -->
<?php

if(isset($_GET['page']) ){
     $path=$_GET['page'];
     $file=$_GET['action'];
    //  echo $baseFolder.$path.'/'.$file;
     if(file_exists($baseFolder.$path.'/'.$file.'.php')){
       
       require_once $baseFolder.$path.'/'.$file.'.php';
     }
    
   }


?>



</div>

</div>
</div>

</div>


<aside class="control-sidebar control-sidebar-dark">

<div class="p-3">
<h5>Title</h5>
<p>Sidebar content</p>
</div>
</aside>


<footer class="main-footer">

<div class="float-right d-none d-sm-inline">
Anything you want
</div>

<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>

<!-- // script  -->
<?php  require_once './partials/scripts.php' ?>
</body>
</html>
