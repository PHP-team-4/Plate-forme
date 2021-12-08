<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/config.php');



$sql = "SELECT * FROM articles";
$result = mysqli_query($conn, $sql);

?>

<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
                <th>ID</th>
            <th>Uploader</th>
            <th>File</th>
            <th>Size (in KB)</th>
            <th>Downloads</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
     <?php
           while($row = mysqli_fetch_assoc($result)){
     ?>
        <?php if(!empty($row['file'])){?>
          <tr>
            <td><?php echo ($row['id_art']) ?></td>
            <td><?php echo ($row['username']) ?></td>
            <td><?php echo ($row['file']) ?></td>
            <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
            <td><?php echo ($row['downloads']) ?></td>
            <td> 
            <a href=" includes/download.php?file_id=<?php echo $row['id_art']; ?>"> download <i class='fas fa-file-download'></i></a>
            </td>
          </tr>
          <?php
           }
        ?> 
          <?php
           }
        ?>  
        </tbody>
      </table>

  </div>
</div>
  
<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');

?>