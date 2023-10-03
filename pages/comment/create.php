<?php
  storeComment($_POST);

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
<label for="comment">Comment</label>
<!-- <input type="hidden" name="id" value="<?=$_SESSION['user']['id']; ?>"> -->
<textarea name="comment" class="form-control" id="comment" ></textarea>
<!-- <input type="text" class="form-control" id="comment" name="text" placeholder="Enter text" value=""> -->
</div>

</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary" name='store_comment'>Submit</button>
</div>
</form>
</div>
</section>
