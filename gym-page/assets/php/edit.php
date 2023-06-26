<?php
// configuration
include('config.php');
 
// new data
$clientName = $_POST['clientName'];
$workoutName = $_POST['workoutName'];
$workoutEquipment = $_POST['workoutEquipment'];
$workoutSet = $_POST['workoutSet'];
$workoutRep = $_POST['workoutRep'];

$id = $_POST['id'];
// query
$sql = "UPDATE workout 
        SET clientName=?, workoutName=?, workoutEquipment=?, workoutSet=?, workoutRep=?
		WHERE id=?";
$q = $connect->prepare($sql);
$q->execute(array($clientName,$workoutName,$workoutEquipment,$workoutSet,$workoutRep,$id));
header("location: viewStaff.php");
 
?>