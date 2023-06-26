


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="thiago" />
	<title>Edit Workout</title>
	<link rel="stylesheet" type="text/css" href="../css/editForm.css">
</head>
<body>
<p><a href="../html/specialArea.html">Back to the Previous Page</a></p>
<section>
<?php
	include('config.php');
	$id=$_GET['id'];
	$result = $connect->prepare("SELECT * FROM workout WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Client Name<br>
<input type="text" name="clientName" value="<?php echo $row['clientName']; ?>" /><br>
Workout Name<br>
<input type="text" name="workoutName" value="<?php echo $row['workoutName']; ?>" /><br>
Equipment Name<br>
<input type="text" name="workoutEquipment" value="<?php echo $row['workoutEquipment']; ?>" /><br>
Workout Set<br>
<input type="text" name="workoutSet" value="<?php echo $row['workoutSet']; ?>" /><br>
Workout Rep<br>
<input type="text" name="workoutRep" value="<?php echo $row['workoutRep']; ?>" /><br>

<button class="button" type="submit" value="Save">Save Workout</button>
</form>
<?php
	}
?>


</section>
</body>
</html>