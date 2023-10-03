<?php
  $userId=$_GET['id'];
  $user=getUserDetail($userId);


   if(count($_POST)>0){

      updateUserDetail($userId,$_POST);
  }
 
?>



<section class="container">
<div class="col-md-12">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Quick Example</h3>
</div>


<form action="" method="POST">
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="<?=$user['email'] ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Fullname</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Enter fullname" value="<?=$user['fullname'] ?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" value='<?=$user['password'] ?>'>
</div>
<div class="form-group">
<label for="exampleInputPassword1_conf">new Password</label>
<input type="password" class="form-control" id="exampleInputPassword1_conf" name="password_conf" placeholder="Password">
</div>
<div class="form-group">
<label for="exampleSelectBorder">Type</label>
<select class="custom-select form-control-border" name="type" id="exampleSelectBorder">
<option value='0' <?=$user['type']==0 ? 'selected' :'' ?>>Super admin</option>
<option value='1' <?=$user['type']==1 ? 'selected' :'' ?>>admin</option>
</select>
</div>
<div class="form-group">
<label for="exampleInputFile">File input</label>
<div class="input-group">
<div class="custom-file">
<input type="file" class="custom-file-input" id="exampleInputFile" name="file">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
</div>
<div class="input-group-append">
<span class="input-group-text">Upload</span>
</div>
</div>
</div>
<div class="form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1" name="check">
<label class="form-check-label" for="exampleCheck1">Check me out</label>
</div>
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary" name='update_user'>Submit</button>
</div>
</form>
</div>
</section>
