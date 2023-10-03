<?php

?> 





<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Responsive Hover Table</h3>
<div class="card-tools">
<div class="input-group input-group-sm" style="width: 150px;">
<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0">
<table class="table table-hover text-nowrap">
<thead>
<tr>
<th>ID</th>
<th>Fullname</th>
<th>Email</th>
<th>Status</th>
<th>Password</th>
<th>Operation</th>
</tr>
</thead>
<tbody>
    
<?php foreach(getAllUsers() as $key=>$value)  { ?>
    
    


<td><?=$value['id'];  ?></td>
<td><?=$value['fullname'] ?></td>
<td><?=$value['email'] ?></td>
<td><span class="tag tag-danger"><?=$value['type'] ?></span></td>
<td><?=$value['password'] ?></td>
<td><a href="?page=users&action=update&id=<?=$_SESSION['user']['id']?>" style="margin-right:10px;">Editle</a></a> <a href="?page=users&action=delete&id=<?=$value['id']?>">Sil</a></td>
</tr>


<?php } ?>
</tbody>
</table>
</div>

</div>

</div>
