<?php include("db.php")?>

<!--Header-->
<?php include("includes/header.php")?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php if (isset($_SESSION['message'])) { ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="alert alert-<?=$_SESSION['message_type']?> d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="<?= $_SESSION['arial']?>"><use xlink:href="#check-circle-fill"/></svg>
  <div>
  <?= $_SESSION['message']?>
  <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
</div>
            
      <?php session_unset(); } ?>


      <div class="card card-body mb-3">
        <form action="save_task.php" method="POST">
          <div class="form-group mb-3">
              <h3>Task App</h3>
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group mb-3">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-dark btn-block" value="Save Task">
        </form>
      </div>
    </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $query="SELECT * FROM task";
                $result_tasks=mysqli_query($conn,$query);
                while($row= mysqli_fetch_array($result_tasks)){?>
                <tr>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><?php echo $row['created_at']?></td>
                    <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
                </tr>
                <?php }?>
                </tbody>
                
            </table>
        </div>
    </div>
</div>


<!--Footer-->
<?php include("includes/footer.php")?>