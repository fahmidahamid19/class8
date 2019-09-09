<?php

$pdo = new PDO("mysql:host=localhost;dbname=laravel", "root", "");

$del_id = $_GET['Id'];
//update section
if(isset($_POST['submit'])){

	$Brand = $_POST['Brand'];
	$Camera = $_POST['Camera'];
	$RAM = $_POST['RAM'];
	$Battery = $_POST['Battery'];


	$q = "UPDATE mobile SET Brand='$Brand',Camera='$Camera',RAM=$RAM,Battery=$Battery WHERE id='$del_id'";
	$statement = $pdo->prepare($q);
	$statement->execute();
	header("location:index.php");
}
//get data begins

 $get_data_sql="select * from mobile WHERE Id=$del_id";
 $get_statement=$pdo->prepare($get_data_sql);
$get_statement->execute();
$result=($get_statement->fetchall());
foreach ($result as $value) {

}
 //get data end
  ?>
  <!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
			<?php
				foreach($result as $value){
			?>
			<form class="form-group" method="POST" action="">
			<input type="text" name="Brand"><br>
			<input type="number" name="Camera"><br>
			<input type="number" name="RAM"><br>
			<input type="number" name="Battery"><br>
			<input type="submit" name="submit" value="Save">
			</form>
			<?php
				}
			?>

</body>
</html>