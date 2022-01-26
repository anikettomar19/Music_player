<?php
  if(isset($_POST['submit'])){
      $file = $_FILES['file'];
      
      $fileName =$_FILES['file']['name'];
      $fileTmpName =$_FILES['file']['tmp_name'];
      $fileSize =$_FILES['file']['size'];
      $fileError =$_FILES['file']['error'];
      $fileType =$_FILES['file']['type'];  
  
       $fileExt = explode('.', $fileName );
       $fileActualExt = strtolower(end($fileExt));

       $allowed = array('jpeg','jpg','png');

       if(in_array($fileActualExt,$allowed)){
          if($fileError === 0){
               if($fileSize <1000000){
                   $fileName_new = uniqid('',true).".".$fileActualExt;
                   $fileDestination = 'uploads/'.$fileName_new;
                   move_uploaded_file($fileTmpName,$fileDestination);
                   header("Location:  index.php?uploadSuccess");
                  }else{
                echo "Your file exceeds  the uploading limit..!!";
               }
          }else {
            echo "There was an error uploading the file..!!";
          } 
       } else{
         echo "You cannot upload files of this type..!!";

       }
       
    }
  