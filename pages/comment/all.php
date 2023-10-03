<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_selected'])) {
        if (isset($_POST['check_id']) && is_array($_POST['check_id'])) {
            foreach ($_POST['check_id'] as $selectedId) {
                
            }
        }
    }
}
?>

<form method="post" action="?page=comment&action=checkdelete" class='col-12'>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>
                <button type="submit" name="delete_selected" class="btn btn-danger float-right">Delete Selected</button>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>ID</th>
                            <th>USER_ID</th>
                            <th>User Fullname</th>
                            <th>Comment</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach (getComments() as $key) { ?>
                            
                            <tr>
                                <td><input type="checkbox" name="check_id[]" value="<?=$key['comment_id']?>"></td>
                                <td><?=$key['comment_id']?></td>
                                <td><?=$key['user_id']?></td>
                                <td><?=$key['fullname']  ?></td>
                                <td><?= $key['comment'] ?></td>
                                <td><a href="?page=comment&action=update&id=<?=$key['comment_id']?>&comment=<?=$key['comment']?>" style="margin-right:10px;">Edit</a> <a href="?page=comment&action=delete&id=<?=$key['comment_id']?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
