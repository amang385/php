$uploads_dir = '/photo/';

  echo $_FILES["photo"]["name"]; 
  echo $_FILES["photo"]["size"];
  echo $_FILES["photo"]["type"];
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