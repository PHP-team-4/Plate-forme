<?php
session_start();
 require 'config.php';
 $email=$_SESSION['email'];
 $sql="SELECT * FROM `employer` WHERE email='$email'";
     $res=mysqli_query($conn, $sql);
     $row=mysqli_fetch_assoc($res);
     
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    // fetch file to download from database
    $sql = "SELECT * FROM `articles` WHERE id_art='$id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploades/'.$file['file'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($filepath));
        readfile($filepath);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE articles SET downloads='$newCount' WHERE id_art='$id'";
        
          if(mysqli_query($conn, $updateQuery)){
            if($row['type']==='user'){
                header("Location: ../articles.php?");
              }else {
                header("Location: ../articlesAdmin.php?");
              }
          }
        exit();
    }else {
    if($row['type']==='user'){
        header("Location: ../articles.php?errorarticle=Error! No ID was passed.");
      }else {
        header("Location: ../articlesAdmin.php?errorarticle=Error! No ID was passed.");
         echo $file['file'];
      }
  }

}





?>
