<?php
require_once ('config.php');
?>


<?php

$userSession = $_SESSION["username"];


if ($userSession == 'adminstaff'){

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="thiago" />
	<title>Edit Workout</title>
	<link rel="stylesheet" type="text/css" href="../css/viewStaff.css">
</head>
<body>
<p><a href="../html/specialArea.html">Back to the Previous Page</a></p>
<section>
  <div class="header">
    <div class="col">Client Name</div>
    <div class="col">Workout Name</div>
	<div class="col">Equipment Name</div>
	<div class="col">Workout Set</div>
	<div class="col">Workout Rep</div>
</div>
<?php
		$result = $connect->prepare("SELECT * FROM workout ORDER BY id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
  <div class="row">
    <div class="col"><?php echo $row['clientName']; ?></div>
    <div class="col"><?php echo $row['workoutName']; ?></div>
	<div class="col"><?php echo $row['workoutEquipment']; ?></div>
	<div class="col"><?php echo $row['workoutSet']; ?></div>
	<div class="col"><?php echo $row['workoutRep']; ?></div>
  </div>
  <button><a href="editform.php?id=<?php echo $row['id']; ?>"> edit </a></button>
  <?php
		}
	?>
</section>
</body>
</html>

<?php
		}
		else {
			header("location:../html/specialArea.html");;
		}
	?>