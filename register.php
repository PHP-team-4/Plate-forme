<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/config.php');


$sql = "SELECT * FROM `employer`";
    
	$result = mysqli_query($conn, $sql);
	

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="includes/scripts.php" method="POST" id="form">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" required >
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" id="password2"required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- <script src="../js/verification.js"></script> -->

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
    <?php if (isset($_GET['erroradmin'])) { ?>
     		<p class="erroradmin "><?php echo $_GET['erroradmin']; ?></p>
     	<?php } ?>
       <?php if (isset($_GET['erroradmin-successful'])) { ?>
     		<p class="erroradmin-successful "><?php echo $_GET['erroradmin-successful']; ?></p>
     	<?php } ?>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>Type</th>
            <th>SELECT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     <?php
           while($row = mysqli_fetch_assoc($result)){
     ?>
          <tr>
            <td><?php echo ($row['id_emp']) ?></td>
            <td><?php echo ($row['username']) ?></td>
            <td><?php echo ($row['email']) ?></td>
            <td><?php echo ($row['password']) ?></td>
            <td><?php echo ($row['type']) ?></td>
            <td>
                 <form action="includes/scripts.php" method="post">
                  <input type="checkbox" name="delete_id" value="<?php echo($row['id_emp'])?>" required>
               
            </td>
            <td> 
                <button type="submit" name="delete_btn"  class="btn btn-danger"> DELETE</button>
              </form>
            </td>
          </tr>
          <?php
           }
        ?>  
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');

?>