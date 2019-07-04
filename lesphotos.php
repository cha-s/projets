<?php
include("config.php");

if(isset($_POST['but_upload'])){

  $nom_img = $_FILES['file']['nom_img'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["nom_img"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){

    // Convert to base64
 $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_nom_img']) );
 $img = 'data:image/'.$imageFileType.';base64,'.$image_base64;
 // Insert record
 $query = "insert into images(img) values('".$img."')";
 mysqli_query($con,$query);

 // Upload file
 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
}

}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>

<?php

$sql = "select name from images where id=1";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$img = $row['nom_img'];
$image_src = "upload/".$img;

?>
<img src='<?php echo $image_src;  ?>' >
