

<?php

include('includes/header.php'); 
include('includes/navbaruser.php'); 
include('includes/config.php');

$reqt = "SELECT * FROM `articles` ORDER BY `time` DESC ";
    
   $results = mysqli_query($conn, $reqt);

   
  
   

?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="includes/scripts.php" method="POST" id="form" enctype="multipart/form-data">

        <div class="modal-body">
            <div class="form-group">
                <label>What do you want to share?</label>        
                <textarea name="pub" class="form-control"cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label>file  :</label>
                <input type="file" name="file" >
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="articlesave" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Article
            </button>
    </h6>
    <?php if (isset($_GET['errorarticle'])) { ?>
     		<p class="erroradmin "><?php echo $_GET['errorarticle']; ?></p>
     	<?php } ?>
       <?php if (isset($_GET['errorarticle-successful'])) { ?>
     		<p class="erroradmin-successful "><?php echo $_GET['errorarticle-successful']; ?></p>
     	<?php } ?>
  </div>
</div>
<article>
  <?php
  
  while( $rows = mysqli_fetch_assoc($results)){
  ?>
<div class="articles">
    <div class="articlenav">
        <div>
          <a href="">
            <img  src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            
            <p class="name">
              <?php echo $rows['username']; $name=$rows['username']; ?> 
          </p>
            <p></p>
        </div>
        <?php
               $req="SELECT type FROM `articles` , `employer` WHERE articles.id_emp=employer.id_emp and articles.username='$name'";
            
               $res = mysqli_query($conn, $req);
               $arry = mysqli_fetch_assoc($res)
            ?>
        <p><?php echo $arry['type']; ?></p>

    </div>
    <div>
        <p class="message">
          
        <?php echo $rows['pub']; ?>
        </p>
        <?php if(!empty($rows['file'])){?>
            <p class="file">
           <a href=" includes/download.php?file_id=<?php echo $rows['id_art']; ?>"> <i class='fas fa-file-download'><?php echo $rows['file'];?> </i></a>
         
          </p>  
         <?php }?>        
    </div>
</div>
<?php
  }
?>

</article>
<?php
include('includes/chats.php');
include('includes/scripts.php');
include('includes/footer.php');
?>
