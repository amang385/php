$uploads_dir = '/photo/';

  $_FILES["photo"]["name"]; 
  $_FILES["photo"]["size"];
  $_FILES["photo"]["type"];
  $pname = $_FILES["photo"]["name"]; 
  $tname=$_FILES["photo"]["tmp_name"];

  $name = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
  $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

   $increment = 0; 
   $pname = $name . '.' . $extension;
   while(is_file($uploads_dir.'/'.$pname)) {
     $increment++;
     $pname = $name . $increment . '.' . $extension;
   }
   move_uploaded_file($tname, $uploads_dir.'/'.$pname);
  // ----------------------------------------------------

         $filepart = $_FILES["Category_img"]["tmp_name"];
         $filename = $_FILES["Category_img"]["name"];
         $filesize = $_FILES["Category_img"]["size"];

        if($filepart != ""){
          if($filesize <= 1000000){
            $fileextension = end(explode(".",$filename));
            $filename = "Pro".time().".".$fileextension;
            move_uploaded_file($filepart,"../img/category/".$filename);
            if($_POST["DB_Category_img"] != ""){
                unlink("../img/category/".$_POST["DB_Category_img"]);
            }
            $Category_img = $filename;
          }else if($filesize >= 3000000){
            echo("<script> alert('ไม่สามารถอัพไฟล์ได้เกิน 3mb');</script>");
          }
        }else{
            $Category_img = $_POST["DB_Category_img"];
        }
