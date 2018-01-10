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
