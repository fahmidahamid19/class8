<?php 
$pdo=new PDO("mysql:host=localhost;dbname=laravel", "root","");
if (isset($_GET['delsucc'])){
echo "deleted";

}
if (isset($_GET['delete'])){
	$Id=$_GET['delete'];
	$del_q="DELETE FROM mobile where id=$Id";
	$del_statement=$pdo->prepare($del_q);
	$del_statement->execute();
	header("location:index.php?delsucc=1");


}
if (isset($_POST['submit'])){
	$Brand=$_POST['Brand'];
	$Camera=$_POST['Camera'];
	$RAM=$_POST['RAM'];
	$Battery=$_POST['Battery'];
//insert begins
$sql="INSERT INTO mobile (Brand, Camera, RAM, Battery)
VALUES ('$Brand','$Camera','$RAM','$Battery')";

$statement=$pdo->prepare($sql);
$statement->execute();
echo "inserted";



	//insert end
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>db form</title>
 </head>
 <body>
 <form method="POST" action=""> 
<input type="text" name="Brand"><br>
<input type="number" name="Camera"><br>
<input type="number" name="RAM"><br>
<input type="number" name="Battery"><br>
<input type="submit" name="submit" value="Save">
 </form>
 <?php 
//get data begins
 $get_data_sql="SELECT * FROM mobile";
 $get_statement=$pdo->prepare($get_data_sql);
$get_statement->execute();
$result=($get_statement->fetchall());
foreach ($result as $value) {

}
 //get data end

  ?>
 <table border="1" style="width: 100%"class="text-center">
 	<tr>
 		<th>Brand</th>
 		<th>Camera</th>
 		<th>RAM</th>
 		<th>Battery</th>
 		<th>action</th>
 	</tr>
 	<?php
 	foreach ($result as $value) {
 	 	
 	 
 	 ?>
 	 <tr>
 	<td><?php echo $value['Brand']; ?></td>
 	<td><?php echo $value['Camera']; ?></td>
 	<td><?php echo $value['RAM']; ?></td>
 	<td><?php echo $value['Battery'];?></td>
 	<td><a href="?delete=<?php echo $value['Id']; ?>">delete</a>|| <a href="update.php?Id=<?php  echo $value['Id']; ?>">update</a></td></td>
 	</tr>
 	<?php 
      }
 	 ?>
 </table>
 </body>
 </html>
